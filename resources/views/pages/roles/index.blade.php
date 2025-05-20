@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="p-6">
            <!--breadcrumb-->
            <div class="hidden sm:flex items-center mb-3 space-x-2 text-sm">
                <div class="pe-3 text-gray-600">Tables</div>
                <div class="ps-3">
                    <nav class="text-gray-600">
                        <ol class="flex items-center space-x-2">
                            <li class="hover:text-gray-900">
                                <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="text-gray-900 font-medium">Roles Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    @can('role-create')
                        <div class="flex space-x-2">
                            <a href="{{ route('roles.create') }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md 
                                  transition-colors duration-200 text-sm font-medium">
                                Create Role
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-lg font-semibold text-gray-900 uppercase">Role and Permissions</h6>
            <hr class="my-4 border-gray-200">
            @can('role-list')
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <div class="align-middle inline-block min-w-full">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Permissions
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($roles as $key => $role)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $role->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach ($role->Permissions as $permission)
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                                {{ $permission->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center space-x-2">
                                                        @can('role-edit')
                                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                                class="inline-flex items-center px-3 py-1.5 border border-transparent 
                                                                text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 
                                                                transition-colors duration-200">
                                                                Edit
                                                            </a>
                                                        @endcan
                                                        @can('role-delite')
                                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="inline-flex items-center px-3 py-1.5 border border-transparent 
                                                                        text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 
                                                                        transition-colors duration-200">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="mt-4 px-4 py-3 border-t border-gray-200 sm:px-6">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
