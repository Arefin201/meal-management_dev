@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Payment</h1>

            <form method="POST" action="{{ route('payments.update', $payment) }}">
                @csrf
                @method('PUT')

                <!-- Amount Input -->
                <div class="mb-6">
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">৳</span>
                        </div>
                        <input type="number" step="0.01"
                            class="block w-full pl-8 pr-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            id="amount" name="amount" value="{{ old('amount', $payment->amount) }}" required>
                    </div>
                    @error('amount')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Payment Date Input -->
                <div class="mb-6">
                    <label for="payment_date" class="block text-sm font-medium text-gray-700 mb-2">Payment Date</label>
                    <input type="date"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="payment_date" name="payment_date"
                        value="{{ old('payment_date', $payment->payment_date->format('Y-m-d')) }}" required>
                    @error('payment_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Member Select -->
                <div class="mb-6">
                    <label for="member_id" class="block text-sm font-medium text-gray-700 mb-2">Member</label>
                    <select
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="member_id" name="member_id" required>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}"
                                {{ $member->id == old('member_id', $payment->member_id) ? 'selected' : '' }}
                                class="{{ !$member->status ? 'text-red-500 bg-red-50' : '' }}">
                                {{ $member->name }}
                                {{ !$member->status ? '(Inactive)' : '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('member_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes Textarea -->
                <div class="mb-8">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <textarea
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="notes" name="notes" rows="3">{{ old('notes', $payment->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <a type="submit" href="{{ route('members.index') }}"
                        class="inline-flex items-center px-4 py-2 m-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                         ← Back
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Update Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
