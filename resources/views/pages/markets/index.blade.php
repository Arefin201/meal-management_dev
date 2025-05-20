@extends('layouts.app')

@section('title', 'Market Expense List')
@section('content')

@section('content')
    <div id="expense" class="tab-content">
        @can('markets-list')
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 md:mb-0">Market Expenses</h3>
                    <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                        <!-- Search Form -->
                        <form action="{{ route('markets.index') }}" method="GET" class="flex flex-col md:flex-row gap-2">
                            <div class="flex items-center gap-2">
                                <label class="text-sm font-medium text-gray-700">From:</label>
                                <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}"
                                    class="border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="text-sm font-medium text-gray-700">To:</label>
                                <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}"
                                    class="border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="bg-indigo-600 text-white px-3 py-1 rounded-lg hover:bg-indigo-700 transition">
                                    Filter
                                </button>
                                <a href="{{ route('markets.index') }}"
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">
                                    Reset
                                </a>
                            </div>
                        </form>
                        @can('markets-create')
                            <!-- Add Expense Button -->
                            <a href="{{ route('markets.create') }}"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition flex items-center justify-center md:justify-start">
                                <i class="fas fa-plus mr-2"></i> Add Expense
                            </a>
                        @endcan
                    </div>
                </div>


                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Member
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($markets as $market)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($market->date)->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $market->notes }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $market->member->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ৳ {{ number_format($market->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @can('markets-edit')
                                            <a href="{{ route('markets.edit', $market->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('markets-delite')
                                            <form action="{{ route('markets.destroy', $market->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No expenses found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4 px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $markets->links() }}
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
