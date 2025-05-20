@extends('layouts.app')
@section('title', 'Cooking Members')
@section('content')

    <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 md:mb-0">Cooking Members</h3>
            @can('cooking_members-create')
                <a href="{{ route('cooking-members.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>New Cooking Member
                </a>
            @endcan
            @can('cooking_payments-list')
                <a href="{{ route('cooking-payments.index') }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition flex items-center">
                    Back Payment Page
                </a>
            @endcan
        </div>

        @can('cooking_members-list')
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($members as $member)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    +880 {{ $member->contact_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $member->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $member->status ? 'Active' : 'In-Active' }}
                                    </a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @can('cooking_members-edit')
                                    <a href="{{ route('cooking-members.edit', $member) }}"
                                        class="text-yellow-600 hover:text-yellow-900 mr-3" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('cooking_members-delite')
                                    <form action="{{ route('cooking-members.destroy', $member) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure?')" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $members->links() }}
            </div>
        @endcan
    </div>

@endsection
