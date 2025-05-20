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
                        <li class="text-gray-700 font-medium">Data Table</li>
                    </ol>
                </nav>
            </div>
            {{-- @can('user-list') --}}
            <div class="ml-auto">
                <a href="{{ route('users.index') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg 
                          transition-colors duration-200 text-sm font-medium">
                    All Users
                </a>
            </div>
            {{-- @endcan --}}
        </div>
        <!--end breadcrumb-->

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h5 class="text-xl font-semibold mb-6 text-gray-800">Create User</h5>
                
                <form action="{{ route('users.store') }}" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Name Input -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="Enter Your Name"
                               class="w-full px-4 py-2.5 rounded-lg border focus:ring-2
                                      @error('name') border-red-500 focus:ring-red-200
                                      @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter your email"
                               class="w-full px-4 py-2.5 rounded-lg border focus:ring-2
                                      @error('email') border-red-500 focus:ring-red-200
                                      @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password"
                               placeholder="Enter your password"
                               class="w-full px-4 py-2.5 rounded-lg border focus:ring-2
                                      @error('password') border-red-500 focus:ring-red-200
                                      @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="space-y-2">
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <input type="password" 
                               id="confirm_password" 
                               name="confirm_password"
                               placeholder="Confirm your password"
                               class="w-full px-4 py-2.5 rounded-lg border focus:ring-2
                                      @error('confirm_password') border-red-500 focus:ring-red-200
                                      @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                        @error('confirm_password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Roles Selection -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Select Roles
                        </label>
                        <div class="flex flex-wrap gap-4 p-2 border rounded-lg">
                            @foreach ($roles as $role)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" 
                                           name="roles[]" 
                                           value="{{ $role->name }}"
                                           id="role_{{ $role->id }}"
                                           @checked(in_array($role->name, old('roles', [])))
                                           class="w-4 h-4 text-blue-600 border-gray-300 rounded 
                                                  focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">{{ $role->name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('roles')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-6">
                        <div class="flex gap-3">
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 
                                           rounded-lg text-sm font-medium transition-colors 
                                           duration-200 focus:outline-none focus:ring-2 
                                           focus:ring-blue-500 focus:ring-offset-2">
                                Save User
                            </button>
                            <button type="reset" 
                                    class="bg-gray-50 hover:bg-gray-100 text-gray-700 px-6 py-2.5 
                                           rounded-lg text-sm font-medium border transition-colors 
                                           duration-200">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection