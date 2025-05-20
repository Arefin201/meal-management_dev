@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">নতুন মিল যোগ করুন</h2>

            <form action="{{ route('meals.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">তারিখ</label>
                    <input type="date" name="date"
                        class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('date', now()->format('Y-m-d')) }}" required>
                </div>

                <div class="space-y-4">
                    @foreach ($members as $member)
                        <div class="border rounded-md p-4">
                            <div class="flex items-center mb-3">
                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    {{ substr($member->name, 0, 2) }}
                                </div>
                                <span class="font-medium">{{ $member->name }}</span>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="meals[{{ $member->id }}][breakfast]" value="1"
                                        class="rounded text-indigo-600 focus:ring-indigo-500">
                                    <span>সকাল</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="meals[{{ $member->id }}][lunch]" value="1"
                                        class="rounded text-indigo-600 focus:ring-indigo-500">
                                    <span>দুপুর</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="meals[{{ $member->id }}][dinner]" value="1"
                                        class="rounded text-indigo-600 focus:ring-indigo-500">
                                    <span>রাত</span>
                                </label>
                            </div>
                            <input type="hidden" name="meals[{{ $member->id }}][member_id]" value="{{ $member->id }}">
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        সেভ করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
