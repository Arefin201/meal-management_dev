<?php

namespace App\Http\Controllers;

use App\Models\CookingPayment;
use App\Models\CookingMember;
use Illuminate\Http\Request;

class CookingPaymentController extends Controller
{
    public function index(Request $request)
    {
        // Get filtered payments
        $payments = CookingPayment::with('cooking_member')
            ->when($request->from, fn($q) => $q->whereDate('payment_date', '>=', $request->from))
            ->when($request->to, fn($q) => $q->whereDate('payment_date', '<=', $request->to))
            ->latest()
            ->paginate(10);

        // Calculate summary
        $totalAmount = $payments->sum('amount');
        $highestPayment = $payments->max('amount');
        $averageWeekly = $totalAmount / 4; // Adjust calculation as needed

        return view('pages.cookings.index', [
            'payments' => $payments,
            'totalAmount' => $totalAmount,
            'highestPayment' => $highestPayment,
            'averageWeekly' => $averageWeekly,
            'filterFrom' => $request->from,
            'filterTo' => $request->to
        ]);
    }

    public function create()
    {
        $members = CookingMember::where('status', 1)->get();
        return view('pages.cookings.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cooking_member_id' => 'required|exists:cooking_members,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string|max:500'
        ]);

        CookingPayment::create($validated);

        return redirect()->route('cooking-payments.index')
            ->with('success', 'Payment recorded successfully');
    }

    public function edit($cookingPayment)
    {
        $payment = CookingPayment::findOrFail($cookingPayment);
        $members = CookingMember::where('status', 1)->get();
        return view('pages.cookings.edit', compact('payment', 'members'));
    }

    public function update(Request $request, $cookingPayment)
    {
        $validated = $request->validate([
            'cooking_member_id' => 'required|exists:cooking_members,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string|max:500'
        ]);

        $payment = CookingPayment::findOrFail($cookingPayment);
        $payment->update($validated);

        return redirect()->route('cooking-payments.index')
            ->with('success', 'Payment updated successfully');
    }


    public function destroy(CookingPayment $cookingPayment)
    {
        $cookingPayment->delete();
        return redirect()->route('cooking-payments.index')
            ->with('success', 'Payment deleted successfully');
    }
}