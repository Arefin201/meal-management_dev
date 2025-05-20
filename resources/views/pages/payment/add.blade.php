@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex gap-2">
            <a href="{{ route('members.index') }}"
                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">
               ← Back
            </a>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Create Payment</h3>
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Date*</label>
                    <input type="date" name="payment_date"
                        class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('date', now()->format('Y-m-d')) }}" required>
                    @error('date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Member -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Member*</label>
                    <select name="member_id"
                        class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                        <option value="" disabled>Select Member</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                {{ $member->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('member_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Amount*</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">৳</span>
                        </div>
                        <input type="number" name="amount" step="0.01"
                            class="w-full pl-8 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="0.00" value="{{ old('amount') }}">
                    </div>
                    @error('amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <textarea name="notes"
                        class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="3">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Save Expense
                    </button>
                  
                </div>
            </div>
        </form>
    </div>
@endsection
