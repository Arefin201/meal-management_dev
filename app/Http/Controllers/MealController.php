<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Member;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|after_or_equal:from_date'
        ]);

        // Get filtered dates
        $dates = Meal::select('date')
            ->when($request->filled('from_date'), function ($query) use ($request) {
                $query->where('date', '>=', $request->input('from_date'));
            })
            ->when($request->filled('to_date'), function ($query) use ($request) {
                $query->where('date', '<=', $request->input('to_date'));
            })
            ->groupBy('date')
            ->orderByDesc('date')
            ->paginate(10)
            ->appends($request->query());

        // Get meals for filtered dates
        $meals = Meal::with('member')
            ->whereIn('date', $dates->pluck('date'))
            ->get()
            ->groupBy('date');

        return view('pages.meals.index', compact('dates', 'meals'));
    }

    public function create()
    {
        $members = Member::active()->get();
        return view('pages.meals.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'meals' => 'required|array',
            'meals.*.member_id' => 'required|exists:members,id',
            'meals.*.breakfast' => 'sometimes|boolean',
            'meals.*.lunch' => 'sometimes|boolean',
            'meals.*.dinner' => 'sometimes|boolean',
        ]);

        foreach ($request->meals as $mealData) {
            Meal::updateOrCreate(
                [
                    'date' => $request->date,
                    'member_id' => $mealData['member_id']
                ],
                [
                    'breakfast' => $mealData['breakfast'] ?? false,
                    'lunch' => $mealData['lunch'] ?? false,
                    'dinner' => $mealData['dinner'] ?? false
                ]
            );
        }

        return redirect()->route('meals.index')->with('success', 'Meals recorded successfully');
    }

    public function edit(Meal $meal)
    {
        $members = Member::active()->get();
        return view('pages.meals.edit', compact('meal', 'members'));
    }

    public function update(Request $request, Meal $meal)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'breakfast' => 'required|boolean',
            'lunch' => 'required|boolean',
            'dinner' => 'required|boolean',
        ]);

        $meal->update($validated);

        return redirect()->route('meals.index')
            ->with('success', 'Meal updated successfully');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index')->with('success', 'Meal deleted successfully');
    }
}