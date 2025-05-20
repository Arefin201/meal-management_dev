<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Members pagination
        $members = Member::paginate(5);

        // Payments with date filtering
        $payments = Payment::with('member')
            ->when(request('from_date'), function ($query) {
                $query->whereDate('payment_date', '>=', request('from_date'));
            })
            ->when(request('to_date'), function ($query) {
                $query->whereDate('payment_date', '<=', request('to_date'));
            })
            ->latest()
            ->paginate(10);

        return view("pages.members.index", compact("members", "payments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.members.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer|digits:10',
            'email' => 'nullable|email|unique:members,email',
            'status' => 'required|integer',
        ]);
        $memer = Member::create([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('members.index')->with('success', 'Member created successfully!');
    }



    public function edit(Member $member)
    {
        return view('pages.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|digits:10',
            'email' => [
                'nullable',
                'email',
                Rule::unique('members')->ignore($member->id)
            ],
            'status' => 'required|integer',
        ]);

        $member->update([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted');
    }
}
