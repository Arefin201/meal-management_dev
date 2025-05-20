@extends('layouts.app')

@section('content')
<div id="dashboard" class="tab-content active">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1: Total Meals -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">মোট মিল (এই মাস)</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2" id="totalMeals">
                        {{ number_format($totalMeals) }}
                    </h3>
                </div>
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-utensils text-blue-500 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-green-500 flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i> 12%
                </span>
                <span class="text-gray-500 text-sm ml-2">গত মাসের তুলনায়</span>
            </div>
        </div>

        <!-- Card 2: Total Market Cost -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">মোট বাজার খরচ</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2" id="totalExpense">
                        ৳ {{ number_format($totalMarketCost) }}
                    </h3>
                </div>
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-shopping-basket text-green-500 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-red-500 flex items-center">
                    <i class="fas fa-arrow-down mr-1"></i> 4%
                </span>
                <span class="text-gray-500 text-sm ml-2">গত মাসের তুলনায়</span>
            </div>
        </div>

        <!-- Card 3: Meal Rate -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">বর্তমান মিল রেট</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2" id="mealRate">
                        ৳ {{ number_format($mealRate, 2) }}
                    </h3>
                </div>
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-calculator text-yellow-500 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-green-500 flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i> 2%
                </span>
                <span class="text-gray-500 text-sm ml-2">গত সপ্তাহের তুলনায়</span>
            </div>
        </div>

        <!-- Card 4: Cooking Payment -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">রান্নার বেতন</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2" id="cookingPayment">
                        ৳ {{ number_format($totalCookingPayment) }}
                    </h3>
                </div>
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-money-bill-wave text-purple-500 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-green-500 flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i> 5%
                </span>
                <span class="text-gray-500 text-sm ml-2">গত সপ্তাহের তুলনায়</span>
            </div>
        </div>
    </div>
</div>
@endsection