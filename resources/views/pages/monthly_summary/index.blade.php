@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    @can('monthlySummary-list') 

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
            <h4 class="text-sm font-medium text-blue-800 mb-2">মোট মিল</h4>
            <p class="text-2xl font-bold text-blue-900">{{ number_format($totalMeals) }}</p>
        </div>
        <div class="bg-green-50 rounded-lg p-4 border-l-4 border-green-500">
            <h4 class="text-sm font-medium text-green-800 mb-2">মোট বাজার খরচ</h4>
            <p class="text-2xl font-bold text-green-900">৳ {{ number_format($totalMarketCost) }}</p>
        </div>
        <div class="bg-yellow-50 rounded-lg p-4 border-l-4 border-yellow-500">
            <h4 class="text-sm font-medium text-yellow-800 mb-2">মিল রেট</h4>
            <p class="text-2xl font-bold text-yellow-900">৳ {{ number_format($mealRate, 2) }}</p>
        </div>
        <div class="bg-purple-50 rounded-lg p-4 border-l-4 border-purple-500">
            <h4 class="text-sm font-medium text-purple-800 mb-2">রান্নার খরচ</h4>
            <p class="text-2xl font-bold text-purple-900">৳ {{ number_format($totalCookingCost) }}</p>
        </div>
    </div>

    <!-- Member Summary Table -->
    <div class="mb-8">
        <h4 class="text-md font-semibold text-gray-800 mb-4">সদস্যদের মাসিক সারসংক্ষেপ</h4>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">সদস্য</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">মোট মিল</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">মোট টাকা</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">জমা</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">বাকি</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">স্ট্যাটাস</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($members as $member)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $member['avatar'] }}" alt="{{ $member['name'] }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $member['name'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ number_format($member['total_meals']) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ৳ {{ number_format($member['total_due'], 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ৳ {{ number_format($member['total_paid'], 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $member['balance'] <= 0 ? 'text-green-600' : 'text-red-600' }}">
                            ৳ {{ number_format(abs($member['balance']), 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $member['status'] == 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $member['status'] == 'paid' ? 'পরিশোধিত' : 'বাকি' }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endcan
</div>
@endsection