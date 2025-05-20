@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Cooking Payment</h1>

    <form action="{{ route('cooking-payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid gap-6 mb-6">
            <div>
                <label class="block mb-2">Member</label>
                <select name="cooking_member_id" class="w-full p-2 border rounded">
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" 
                            {{ $member->id == $payment->cooking_member_id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2">Amount</label>
                <input type="number" name="amount" step="0.01" 
                       value="{{ old('amount', $payment->amount) }}"
                       class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block mb-2">Payment Date</label>
                <input type="date" name="payment_date" 
                       value="{{ old('payment_date', $payment->payment_date->format('Y-m-d')) }}"
                       class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block mb-2">Notes</label>
                <textarea name="notes" rows="3" 
                          class="w-full p-2 border rounded">{{ old('notes', $payment->notes) }}</textarea>
            </div>
        </div>

        <button type="submit" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Update Payment
        </button>
    </form>
</div>
@endsection
