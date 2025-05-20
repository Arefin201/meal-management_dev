
<!-- Header -->
<header class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg relative">
    <div class="container mx-auto px-4 py-4 sm:py-6">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h1 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-0">Meal Account Management</h1>

            <!-- Mobile menu button -->
            <button id="mobileMenuBtn" class="sm:hidden flex items-center p-2 rounded-md text-white hover:bg-indigo-500">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-4 w-full sm:w-auto">
                <div class="flex items-center space-x-2 w-full sm:w-auto">
                    
                    
                </div>
                <div class="flex items-center space-x-2 w-full sm:w-auto">
                    
                    <a href="{{route('logout')}}"
                        class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-medium hover:bg-indigo-100 transition flex items-center w-1/2 sm:w-auto justify-center">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
