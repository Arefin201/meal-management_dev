@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-6">Add New Cooking Payment</h1>

        <form action="{{ route('cooking-payments.store') }}" method="POST">
            @csrf

            <div class="grid gap-6 mb-6">
                <div>
                    <label class="block mb-2">Member*</label>
                    <select name="cooking_member_id" class="w-full p-2 border rounded">
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-2">Amount*</label>
                    <input type="number" name="amount" step="0.01" class="w-full p-2 border rounded" required>
                </div>

                <div>
                    <label class="block mb-2">Payment Date*</label>
                    <input type="date" name="payment_date" class="w-full p-2 border rounded" required>
                </div>

                <div>
                    <label class="block mb-2">Notes</label>
                    <textarea name="notes" rows="3" class="w-full p-2 border rounded"></textarea>
                </div>
            </div>
            <a type="submit" href="{{ route('cooking-payments.index') }}"
                class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg m-2 hover:bg-gray-700 transition">
                Back
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Payment
            </button>
        </form>
    </div>
@endsection
