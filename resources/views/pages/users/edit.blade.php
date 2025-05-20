@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="p-6">
            <!-- Breadcrumb and header code remains same -->

            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h5 class="text-xl font-semibold mb-6 text-gray-800">Update User</h5>

                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-50 text-green-600 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-3 bg-red-50 text-red-600 rounded-lg text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name Input -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Full Name
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                placeholder="Enter full name"
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
                                Email Address
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                placeholder="Enter email address"
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
                                New Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    placeholder="Leave blank to keep current password"
                                    class="w-full px-4 py-2.5 rounded-lg border focus:ring-2
                                          @error('password') border-red-500 focus:ring-red-200
                                          @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center toggle-password">
                                    <i class="bx bx-hide text-gray-400 hover:text-gray-600"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirm Password
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm new password"
                                class="w-full px-4 py-2.5 rounded-lg border focus:ring-2
                                      @error('password') border-red-500 focus:ring-red-200
                                      @else border-gray-200 focus:border-blue-500 focus:ring-blue-200 @enderror">
                        </div>

                        <!-- Roles Selection -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Roles
                            </label>
                            <div class="p-4 border border-gray-200 rounded-lg space-y-2">
                                @foreach ($roles as $role)
                                    <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                            id="role_{{ $role->id }}" @checked(in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())))
                                            class="w-4 h-4 text-blue-600 border-gray-300 rounded 
                                                  focus:ring-blue-500 @error('roles') border-red-500 @enderror">
                                        <span class="text-sm text-gray-700">{{ $role->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('roles')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            @error('roles.*')
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
                                    Update User
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const password = document.querySelector('#password');
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    const icon = this.querySelector('i');
                    icon.classList.toggle('bx-hide');
                    icon.classList.toggle('bx-show');
                });
            });
        });
    </script>
@endpush
