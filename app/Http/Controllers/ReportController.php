<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use App\Models\Member;
use App\Models\Market;
use App\Models\Payment;
use App\Models\CookingPayment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function monthlySummary(Request $request)
    {
        $request->validate([
            'month' => 'nullable|integer|between:1,12',
            'year' => 'nullable|integer|min:2020|max:2030'
        ]);

        $month = $request->month ?? now()->month;
        $year = $request->year ?? now()->year;

        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        // Total Calculations
        $totalMeals = Meal::whereBetween('date', [$startDate, $endDate])
            ->get()
            ->sum(fn($meal) => $meal->breakfast + $meal->lunch + $meal->dinner);

        $totalMarketCost = Market::whereBetween('date', [$startDate, $endDate])->sum('amount');
        $totalCookingCost = CookingPayment::whereBetween('payment_date', [$startDate, $endDate])->sum('amount');
        
        $mealRate = $totalMeals > 0 ? $totalMarketCost / $totalMeals : 0;

        // Member Calculations
        $members = Member::with(['meals' => fn($q) => $q->whereBetween('date', [$startDate, $endDate]),
                            'payments' => fn($q) => $q->whereBetween('payment_date', [$startDate, $endDate])])
            ->get()
            ->map(function($member) use ($mealRate) {
                $mealsCount = $member->meals->sum(fn($meal) => 
                    $meal->breakfast + $meal->lunch + $meal->dinner
                );
                
                $totalDue = $mealsCount * $mealRate;
                $totalPaid = $member->payments->sum('amount');

                return [
                    'id' => $member->id,
                    'name' => $member->name,
                    'avatar' => $member->avatar,
                    'total_meals' => $mealsCount,
                    'total_due' => $totalDue,
                    'total_paid' => $totalPaid,
                    'balance' => $totalDue - $totalPaid,
                    'status' => ($totalDue - $totalPaid) <= 0 ? 'paid' : 'due'
                ];
            });

        return view('pages.monthly_summary.index', [
            'members' => $members,
            'totalMeals' => $totalMeals,
            'totalMarketCost' => $totalMarketCost,
            'totalCookingCost' => $totalCookingCost,
            'mealRate' => $mealRate,
            'selectedMonth' => $month,
            'selectedYear' => $year
        ]);
    }
}