<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Market;
use App\Models\CookingPayment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Current month calculations
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth()->format('Y-m-d');
        $endOfMonth = $now->endOfMonth()->format('Y-m-d');

        // Total Meals
        $totalMeals = Meal::whereBetween('date', [$startOfMonth, $endOfMonth])
            ->get()
            ->sum(function($meal) {
                return $meal->breakfast + $meal->lunch + $meal->dinner;
            });

        // Total Market Cost
        $totalMarketCost = Market::whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        // Meal Rate Calculation (Assuming meal rate is total cost / total meals)
        $mealRate = 0;
        if($totalMeals > 0 && $totalMarketCost > 0) {
            $mealRate = $totalMarketCost / $totalMeals;
        }

        // Cooking Payments
        $totalCookingPayment = CookingPayment::whereBetween('payment_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        return view('dashboard', compact(
            'totalMeals',
            'totalMarketCost',
            'mealRate',
            'totalCookingPayment'
        ));
    }
}