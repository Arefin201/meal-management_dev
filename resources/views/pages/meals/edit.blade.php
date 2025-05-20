@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">মিল সম্পাদনা করুন</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-600 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('meals.update', $meal) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">তারিখ</label>
                    <input type="date" name="date"
                        class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('date', \Carbon\Carbon::parse($meal->date)->format('Y-m-d')) }}" required>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">সদস্য</label>
                    <select name="member_id" class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500"
                        required>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}"
                                {{ $member->id == old('member_id', $meal->member_id) ? 'selected' : '' }}>
                                {{ $member->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <fieldset class="space-y-4">
                        <legend class="text-sm font-medium text-gray-700 mb-2">মিল</legend>

                        <label class="flex items-center space-x-2">
                            <input type="hidden" name="breakfast" value="0">
                            <x-checkbox name="breakfast" :checked="old('breakfast', $meal->breakfast)" value="1" />
                            <span>সকাল</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="hidden" name="lunch" value="0">
                            <x-checkbox name="lunch" :checked="old('lunch', $meal->lunch)" value="1" />
                            <span>দুপুর</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="hidden" name="dinner" value="0">
                            <x-checkbox name="dinner" :checked="old('dinner', $meal->dinner)" value="1" />
                            <span>রাত</span>
                        </label>
                    </fieldset>
                </div>

                <div class="mt-6 flex gap-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        আপডেট করুন
                    </button>
                    <a href="{{ route('meals.index') }}"
                        class="w-full bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-center">
                        বাতিল
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
