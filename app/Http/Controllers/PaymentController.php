<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Member;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        $members = Member::where('status', 1) // Active members
            ->get();

        return view('pages.payment.add', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'notes' => 'nullable|string',
        ]);

        Payment::create($validated);

        return redirect()->route('members.index')->with('success', 'Payment recorded successfully!');
    }

    public function show(Payment $payment)
    {
        return view('pages.payment.show', compact('payment'));
    }


    public function edit(Payment $payment)
    {
        $members = Member::where('status', 1)->get();
        return view('pages.payment.edit', compact('payment', 'members'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'notes' => 'nullable|string',
        ]);

        $payment->update($validated);

        return redirect()->route('members.index', $payment)->with('success', 'Payment updated successfully!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('members.index')->with('success', 'Payment deleted successfully!');
    }
}