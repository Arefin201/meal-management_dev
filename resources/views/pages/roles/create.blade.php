@extends('layouts.app')
@section('content')
   
<div class="min-h-screen bg-gray-50">
    <div class="p-6">
        <!--breadcrumb-->
        <div class="hidden sm:flex items-center mb-6 space-x-2 text-sm">
            <div class="pe-3 text-gray-500">Tables</div>
            <div class="ps-3">
                <nav class="flex" aria-label="breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="hover:text-gray-700">
                            <a href="javascript:;" class="text-gray-500 hover:text-blue-600">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="text-gray-700 font-medium">Create Role</li>
                    </ol>
                </nav>
            </div>
            @can('role-list')
                <div class="ms-auto">
                    <a href="{{route('roles.index')}}" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg 
                            transition-colors duration-200 text-sm font-medium">
                        All Roles
                    </a>
                </div>
            @endcan
        </div>
        <!--end breadcrumb-->

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h5 class="text-xl font-semibold mb-6 text-gray-800">Create Role</h5>
                
                <form action="{{route('roles.store')}}" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Role Name Input -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Role Name
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter Role Name"
                               class="w-full px-4 py-2.5 rounded-lg border focus:ring-2 
                                      @error('name') border-red-500 focus:ring-red-200
                                      @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Permissions Checkboxes -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Permissions
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($permissions as $permission)
                                <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded">
                                    <input type="checkbox" 
                                           name="permission[{{ $permission->id }}]" 
                                           value="{{ $permission->id }}"
                                           @checked(old("permission.{$permission->id}"))
                                           class="h-4 w-4 text-blue-600 border-gray-300 rounded 
                                                  focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('permission')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white 
                                       px-6 py-2.5 rounded-lg text-sm font-medium transition-colors 
                                       duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 
                                       focus:ring-offset-2">
                            Save Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection