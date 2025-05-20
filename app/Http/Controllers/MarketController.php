<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class MarketController extends Controller
{


    public function index(Request $request)
    {
        $query = Market::with('member')->latest();

        // Date range filter
        if ($request->filled(['from_date', 'to_date'])) {
            $query->whereBetween('date', [
                Carbon::parse($request->from_date)->startOfDay(),
                Carbon::parse($request->to_date)->endOfDay()
            ]);
        }

        $markets = $query->paginate(5)->appends($request->query());

        return view('pages.markets.index', compact('markets'));
    }

    public function create()
    {
        $members = Member::where('status', 1)->get();
        return view('pages.markets.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:1',
            'notes' => 'required|string',
        ]);

        Market::create($request->all());

        return redirect()->route('markets.index')
            ->with('success', 'Market expense added successfully');
    }

    public function edit(Market $market)
    {
        $members = Member::where('status', 1)->get();
        return view('pages.markets.edit', compact('market', 'members'));
    }

    public function update(Request $request, Market $market)
    {
        $request->validate([
            'date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'notes' => 'required|string',
        ]);

        $market->update($request->all());

        return redirect()->route('markets.index')
            ->with('success', 'Market expense updated successfully');
    }

    public function destroy(Market $market)
    {
        $market->delete();
        return redirect()->route('markets.index')
            ->with('success', 'Market expense deleted successfully');
    }
}