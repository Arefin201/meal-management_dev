@extends('layouts.app')

@section('title', 'দৈনিক মিলের হিসাব')

@section('content')

    <div id="members" class="tab-content">
        @can('member-list')
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    @can('member-create')
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 md:mb-0">List of Members</h3>
                        <a href="{{ route('members.create') }}"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition flex items-center">
                            <i class="fas fa-user-plus mr-2"></i> New Member
                        </a>
                    @endcan
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Mobile</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    E-Mail</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($members as $member)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&color=7F9CF5&background=EBF4FF"
                                                    alt="{{ $member->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">+880 {{ $member->number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $member->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $member->status ? 'Active' : 'In-Active' }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @can('member-edit')
                                            <a href="{{ route('members.edit', $member->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('member-delite')
                                            <form action="{{ route('members.destroy', $member->id) }}" method="POST"
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
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No members found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4 px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        @endcan
    </div>

    <div id="payments" class="tab-content">
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            @can('payments-list')
                <!-- Payments Filter Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                        <form action="{{ route('members.index') }}" method="GET" class="flex flex-col md:flex-row gap-2">
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
                                <a href="{{ route('members.index') }}"
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Payments List Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    @can('payments-create')
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 md:mb-0">Members Payment List</h3>
                        <a href="{{ route('payments.create') }}"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition flex items-center">
                            <i class="fas fa-money-bill-wave mr-2"></i> Payment
                        </a>
                    @endcan
                </div>
                <!-- Payments Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SL:
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($payments as $key => $payment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500 hover:underline">
                                        <a href="{{ route('payments.show', $payment->id) }}">
                                            {{ $payment->member->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ৳{{ number_format($payment->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $payment->payment_date->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @can('payments-show')
                                            <a href="{{ route('payments.show', $payment->id) }}"
                                                class="text-green-600 hover:text-green-900 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('payments-edit')
                                            <a href="{{ route('payments.edit', $payment->id) }}"
                                                class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('payments-delite')
                                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure you want to delete this payment?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No payments found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Payments Pagination -->
                    <div class="mt-4 px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $payments->links() }}
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
