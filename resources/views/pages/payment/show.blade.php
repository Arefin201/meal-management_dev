@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Payment Details</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="text-lg font-semibold mb-4">Payment #{{ $payment->id }}</h5>
        <p class="text-gray-700 leading-relaxed">
            <span class="font-semibold">Amount:</span> ${{ number_format($payment->amount, 2) }}<br>
            <span class="font-semibold">Date:</span> {{ $payment->payment_date->format('M d, Y') }}<br>
            <span class="font-semibold">Member:</span> {{ $payment->member->name }}<br>
            <span class="font-semibold">Notes:</span> {{ $payment->notes ?? 'N/A' }}
        </p>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('payments.edit', $payment) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition duration-200">Edit</a>
            <form method="POST" action="{{ route('payments.destroy', $payment) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition duration-200" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('members.index') }}" class="inline-block mt-6 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-200"> ←Back to Payments</a>
</div>
@endsection
