@extends('layouts.app')
@section('content')
    <div id="cooking-payment" class="tab-content">
        @can('cooking_payments-list')
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 md:mb-0">রান্নার পারিশ্রমিক</h3>
                    <div class="flex space-x-4">
                        <form method="GET" action="{{ route('cooking-payments.index') }}"
                            class="flex flex-col md:flex-row gap-2">
                            <div class="flex items-center gap-2">
                                <label for="from">থেকে</label>
                                <input type="date" name="from" value="{{ $filterFrom }}"
                                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div class="flex items-center gap-2">
                                <label for="to">পর্যন্ত</label>
                                <input type="date" name="to" value="{{ $filterTo }}"
                                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <button type="submit"
                                class="bg-amber-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-amber-700 transition flex items-center">
                                ফিল্টার
                            </button>
                        </form>
                        @can('cooking_payments-create')
                            <a href="{{ route('cooking-payments.create') }}"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition flex items-center">
                                <i class="fas fa-plus mr-2"></i> নতুন পেমেন্ট
                            </a>
                        @endcan
                        @can('cooking_members-create')
                            <a href="{{ route('cooking-members.create') }}"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition flex items-center">
                                <i class="fas fa-plus mr-2"></i> সদস্য যোগ করুন
                            </a>
                        @endcan
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">তারিখ</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">সদস্য</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">পরিমাণ</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">বিবরণ</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">স্ট্যাটাস</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">কার্যক্রম</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($payments as $payment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $payment->payment_date->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $payment->cooking_member->name ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ৳ {{ number_format($payment->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $payment->notes ?? 'কোন বিবরণ নেই' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            পরিশোধিত
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @can(' cooking_payments-edit')
                                            <a href="{{ route('cooking-payments.edit', $payment->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('cooking_payments-delite')
                                            <form action="{{ route('cooking-payments.destroy', $payment->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('আপনি কি নিশ্চিত?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        কোন পেমেন্ট পাওয়া যায়নি
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">মাসিক রান্নার খরচের সারসংক্ষেপ</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-medium text-gray-500 mb-2">মোট রান্নার খরচ</h4>
                        <p class="text-2xl font-bold text-gray-800">৳ {{ number_format($totalAmount, 2) }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-medium text-gray-500 mb-2">সর্বোচ্চ পারিশ্রমিক</h4>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $payments->sortByDesc('amount')->first()->cooking_member->name ?? 'N/A' }} -
                            ৳ {{ number_format($highestPayment, 2) }}
                        </p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-medium text-gray-500 mb-2">গড় সাপ্তাহিক খরচ</h4>
                        <p class="text-2xl font-bold text-gray-800">৳ {{ number_format($averageWeekly, 2) }}</p>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="cookingPaymentChart"></canvas>
                </div>
            </div>
        @endcan
    </div>
@endsection
