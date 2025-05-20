@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        @can('meals-list')
            <div class="py-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-900">দৈনিক মিল হিসাব</h1>

                    <div class="flex flex-col md:flex-row gap-4 mt-4 md:mt-0">
                        <form action="{{ route('meals.index') }}" method="GET" class="flex flex-col md:flex-row gap-2">
                            <div class="flex gap-2">
                                <div class="flex items-center gap-2">
                                    <label class="text-sm">থেকে:</label>
                                    <input type="date" name="from_date" value="{{ request('from_date') }}"
                                        class="rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="text-sm">প্রতি:</label>
                                    <input type="date" name="to_date" value="{{ request('to_date') }}"
                                        class="rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                    খুঁজুন
                                </button>
                                <a href="{{ route('meals.index') }}"
                                    class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                                    রিসেট
                                </a>
                                @can('meals-create')
                                    <a href="{{ route('meals.create') }}"
                                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                        যোগ করুন
                                    </a>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">তারিখ
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">সদস্য
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">সকাল
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">দুপুর
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">রাত
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">মোট
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">একশন
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-300">
                            @forelse($dates as $date)
                                @if ($meals->has($date->date))
                                    <tr>
                                        <td class="px-5 py-4 whitespace-nowrap bg-gray-50"
                                            rowspan="{{ $meals[$date->date]->count() + 1 }}">
                                            <span class="text-sm font-semibold text-gray-900">
                                                {{ $date->date }}
                                            </span>
                                        </td>
                                    </tr>
                                    @foreach ($meals[$date->date] as $meal)
                                        <tr>
                                            <td class="px-5 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-8 h-8">
                                                        <div
                                                            class="w-full h-full rounded-full bg-blue-100 flex items-center justify-center">
                                                            <span class="text-blue-600 text-sm font-medium">
                                                                {{ Str::substr($meal->member->name, 0, 2) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-nowrap">
                                                            {{ $meal->member->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-4 whitespace-nowrap">
                                                <x-checkbox :checked="$meal->breakfast" disabled />
                                            </td>
                                            <td class="px-5 py-4 whitespace-nowrap">
                                                <x-checkbox :checked="$meal->lunch" disabled />
                                            </td>
                                            <td class="px-5 py-4 whitespace-nowrap">
                                                <x-checkbox :checked="$meal->dinner" disabled />
                                            </td>
                                            <td class="px-5 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                {{ $meal->total }}
                                            </td>
                                            <td class="px-5 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-2">
                                                    @can('meals-edit')
                                                        <a href="{{ route('meals.edit', $meal) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">
                                                            সম্পাদনা
                                                        </a>
                                                    @endcan
                                                    @can('meals-delite')
                                                        <form method="POST" action="{{ route('meals.destroy', $meal) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                                onclick="return confirm('আপনি কি নিশ্চিত?')">
                                                                মুছুন
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7" class="px-5 py-4 text-center text-gray-500">
                                        কোন মিলের তথ্য পাওয়া যায়নি
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $dates->links() }}
                </div>
            </div>
        @endcan
    </div>
@endsection
