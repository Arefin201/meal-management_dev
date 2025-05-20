 <!-- Mobile Navigation Menu -->
 <div id="mobileNavMenu" class="bg-white shadow-md hidden sm:hidden w-full absolute z-20">
     <div class="w-full py-2">
         <div class="flex flex-col">
             <a href="{{ route('dashboard') }}"
                 class="mobile-nav-item py-3 px-4 flex items-center {{ request()->routeIs('dashboard') ? 'text-indigo-600' : '' }}">
                 <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
             </a>

             @can('meals-menu')
                 <a href="{{ route('meals.index') }}"
                     class="mobile-nav-item py-3 px-4 flex items-center {{ request()->routeIs('meals') ? 'text-indigo-600' : '' }}">
                     <i class="fas fa-utensils mr-2"></i> Daily Meal
                 </a>
             @endcan
             @can('markets-menu')
                 <a href="{{ route('markets.index') }}"
                     class="mobile-nav-item py-3 px-4 flex items-center {{ request()->routeIs('markets.index') ? 'text-indigo-600' : '' }}">
                     <i class="fas fa-shopping-basket mr-2"></i> Market Cost
                 </a>
             @endcan
             @can('member-menu')
                 <a href="{{ route('members.index') }}"
                     class="mobile-nav-item py-3 px-4 flex items-center {{ request()->routeIs('members.index') ? 'text-indigo-600' : '' }}">
                     <i class="fas fa-users mr-2"></i> Members
                 </a>
             @endcan
             @can('cooking_payments-menu')
                 <a href="{{ route('cooking-payments.index') }}"
                     class="mobile-nav-item py-3 px-4 flex items-center {{ request()->routeIs('cookings') ? 'text-indigo-600' : '' }}">
                     <i class="fas fa-money-bill-wave mr-2"></i> Cooking Payment
                 </a>
             @endcan
             @can('monthlySummary-menu')
                 <a href="{{ route('reports.monthly') }}"
                     class="mobile-nav-item py-3 px-4 flex items-center {{ request()->routeIs('monthly-summary') ? 'text-indigo-600' : '' }}">
                     <i class="fas fa-file-invoice-dollar mr-2"></i> Monthly Summary
                 </a>
             @endcan
             @can('role-menu')
                 <div class="mobile-nav-item py-3 px-4">
                     <button class="w-full text-left flex items-center justify-between mobile-dropdown-toggle"
                         data-target="rolePerm">
                         <span class="text-base"><i class="fas fa-user-shield mr-2"></i> Role and Permission</span>
                         <i class="fas fa-chevron-down text-sm ml-2"></i>
                     </button>
                     <div id="rolePerm" class="hidden mt-2 ml-6 space-y-2">
                         @can('role-list')
                             <a href="{{ route('roles.index') }}"
                                 class="block py-2 {{ request()->routeIs('roles.index') ? 'text-indigo-600' : '' }}">
                                 <i class="fas fa-circle text-xs mr-2"></i> All Roles
                             </a>
                         @endcan
                         @can('role-create')
                             <a href="{{ route('roles.create') }}"
                                 class="block py-2 {{ request()->routeIs('roles.create') ? 'text-indigo-600' : '' }}">
                                 <i class="fas fa-circle text-xs mr-2"></i> Create Role
                             </a>
                         @endcan
                     </div>
                 </div>
             @endcan
             @can('user-menu')
                 <div class="mobile-nav-item py-3 px-4">
                     <button class="w-full text-left flex items-center justify-between mobile-dropdown-toggle"
                         data-target="users">
                         <span class="text-base"><i class="fas fa-users-cog mr-2"></i> Users</span>
                         <i class="fas fa-chevron-down text-sm ml-2"></i>
                     </button>
                     <div id="users" class="hidden mt-2 ml-6 space-y-2">
                         @can('user-list')
                             <a href="{{ route('users.index') }}"
                                 class="block py-2 {{ request()->routeIs('users.index') ? 'text-indigo-600' : '' }}">
                                 <i class="fas fa-circle text-xs mr-2"></i> All Users
                             </a>
                         @endcan

                         @can('user-create')
                             <a href="{{ route('users.create') }}"
                                 class="block py-2 {{ request()->routeIs('users.create') ? 'text-indigo-600' : '' }}">
                                 <i class="fas fa-circle text-xs mr-2"></i> Create User
                             </a>
                         @endcan

                     </div>
                 </div>
             @endcan
         </div>
     </div>
 </div>

 <!-- Desktop Navigation -->
 <nav class="bg-white shadow-md sticky top-0 z-10 block">
     <div class="container mx-auto">
         <div class="flex overflow-x-auto hide-scrollbar whitespace-nowrap">
             <a href="{{ route('dashboard') }}"
                 class="flex-shrink-0 px-3 lg:px-6 py-3 font-medium border-b-2 hover:border-gray-300 focus:outline-none {{ request()->routeIs('dashboard') ? 'active-nav' : 'border-transparent' }}">
                 <i class="fas fa-tachometer-alt"></i> Dashboard
             </a>
             @can('meals-menu')
                 <a href="{{ route('meals.index') }}"
                     class="flex-shrink-0 px-3 lg:px-6 py-3 font-medium border-b-2 hover:border-gray-300 focus:outline-none {{ request()->routeIs('meals') ? 'active-nav' : 'border-transparent' }}">
                     <i class="fas fa-utensils"></i> Daily Meal
                 </a>
             @endcan
             @can('markets-menu')
                 <a href="{{ route('markets.index') }}"
                     class="flex-shrink-0 px-3 lg:px-6 py-3 font-medium border-b-2 hover:border-gray-300 focus:outline-none {{ request()->routeIs('markets.index') ? 'active-nav' : 'border-transparent' }}">
                     <i class="fas fa-shopping-basket"></i> Market Cost
                 </a>
             @endcan
             @can('member-menu')
                 <a href="{{ route('members.index') }}"
                     class="flex-shrink-0 px-3 lg:px-6 py-3 font-medium border-b-2 hover:border-gray-300 focus:outline-none {{ request()->routeIs('members.index') ? 'active-nav' : 'border-transparent' }}">
                     <i class="fas fa-users"></i> Members
                 </a>
             @endcan
             @can('cooking_payments-menu')
                 <a href="{{ route('cooking-payments.index') }}"
                     class="flex-shrink-0 px-3  py-3 font-medium border-b-2 hover:border-gray-300 focus:outline-none {{ request()->routeIs('cookings') ? 'active-nav' : 'border-transparent' }}">
                     <i class="fas fa-money-bill-wave"></i> Cooking Payment
                 </a>
             @endcan
             @can('monthlySummary-menu')
                 <a href="{{ route('reports.monthly') }}"
                     class="flex-shrink-0 px-3 py-3 font-medium border-b-2 hover:border-gray-300 focus:outline-none {{ request()->routeIs('monthly-summary') ? 'active-nav' : 'border-transparent' }}">
                     <i class="fas fa-file-invoice-dollar"></i> Monthly Summary
                 </a>
             @endcan
             <!-- Desktop Dropdowns - UPDATED -->
             @can('role-menu')
                 <div class="desktop-dropdown flex-shrink-0">
                     <button
                         class="px-3 md:px-4 md:py-4 font-medium border-b-2 border-transparent hover:border-gray-300 focus:outline-none flex items-center">
                         <i class="fas fa-user-shield"></i> Role & Permission
                         <i class="fas fa-chevron-down ml-2 text-sm"></i>
                     </button>
                     <div class="desktop-dropdown-menu absolute left-0 mt-0 w-48 bg-white shadow-lg rounded-lg py-2 z-30">
                         @can('role-list')
                             <a href="{{ route('roles.index') }}"
                                 class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('roles.index') ? 'text-indigo-600' : '' }}">
                                 All Roles
                             </a>
                         @endcan
                         @can('role-create')
                             <a href="{{ route('roles.create') }}"
                                 class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('roles.create') ? 'text-indigo-600' : '' }}">
                                 Create Role
                             </a>
                         @endcan
                     </div>
                 </div>
             @endcan
             @can('user-menu')
                 <div class="desktop-dropdown flex-shrink-0">
                     <button
                         class="px-3 md:px-4 md:py-4 font-medium border-b-2 border-transparent hover:border-gray-300 focus:outline-none flex items-center">
                         <i class="fas fa-users-cog"></i> Users
                         <i class="fas fa-chevron-down ml-2 text-sm"></i>
                     </button>
                     <div class="desktop-dropdown-menu absolute left-0 mt-0 w-48 bg-white shadow-lg rounded-lg py-2 z-30">
                         @can('user-list')
                             <a href="{{ route('users.index') }}"
                                 class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('users.index') ? 'text-indigo-600' : '' }}">
                                 <i class="fas fa-circle text-xs"></i> All Users
                             </a>
                         @endcan
                         @can('user-create')
                             <a href="{{ route('users.create') }}"
                                 class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('users.create') ? 'text-indigo-600' : '' }}">
                                 <i class="fas fa-circle text-xs"></i> Create User
                             </a>
                         @endcan
                     </div>
                 </div>
             @endcan
         </div>
     </div>
 </nav>
