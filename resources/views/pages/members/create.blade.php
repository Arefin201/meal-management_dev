@extends('layouts.app')

@section('title', 'Add New Member')
@section('content')

<div class="bg-white overflow-y-auto h-full w-full" id="addMemberModal"> <!-- Changed background to white -->
    <div class="relative p-5 border mx-auto w-96 shadow-lg rounded-md bg-white"> <!-- Changed background to white -->
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Add New Member</h3>
            <form method="POST" action="{{ route('members.store') }}" class="mt-4 space-y-4">
                @csrf

                <!-- Name Field (unchanged) -->
                <div class="text-left">
                    <label class="block text-sm font-medium text-gray-700">Name*</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mobile Number Field (fixed) -->
                <div class="text-left">
                    <label class="block text-sm font-medium text-gray-700">Mobile Number*</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 rounded-l-md">
                            +880
                        </span>
                        <input type="tel" name="number" value="{{ old('number') }}" 
                            pattern="[0-9]{10}" maxlength="10" 
                            class="mt-1 p-2 w-full border rounded-r-md @error('number') border-red-500 @enderror"
                            placeholder="10-digit number">
                    </div>
                    @error('number')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field (unchanged) -->
                <div class="text-left">
                    <label class="block text-sm font-medium text-gray-700">E-Mail</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status Field (fixed) -->
                <div class="text-left">
                    <label class="block text-sm font-medium text-gray-700">Status*</label>
                    <select name="status" class="mt-1 p-2 w-full border rounded-md @error('status') border-red-500 @enderror">
                        <option value="" disabled>Select</option>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>In-active</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Buttons (fixed back button) -->
                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('members.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                        Back
                    </a>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection