<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CookingMemberController;
use App\Http\Controllers\CookingPaymentController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    // Log-Out
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    // All Roles Route List
    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:role-menu|role-list')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:role-create')->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->middleware('permission:role-create')->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->middleware('permission:role-edit')->name('roles.edit');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->middleware('permission:role-edit')->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->middleware('permission:role-delite')->name('roles.destroy');
    ////////////////
// All User Route List
    Route::get('/users', [UserController::class, 'index'])->middleware('permission:user-manu|user-list')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:user-create')->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->middleware('permission:user-create')->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('permission:user-edit')->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('permission:user-edit')->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('permission:user-delite')->name('users.destroy');
    ////////////


// Route::resource('meals', MealController::class);
//All Members Route List
    Route::get('/meals', [MealController::class, 'index'])->middleware('permission:meals-menu|meals-list')->name('meals.index');
    Route::get('/meals/create', [MealController::class, 'create'])->middleware('permission:meals-create')->name('meals.create');
    Route::post('/meals', [MealController::class, 'store'])->middleware('permission:meals-create')->name('meals.store');
    Route::get('/meals/{meal}/edit', [MealController::class, 'edit'])->middleware('permission:meals-edit')->name('meals.edit');
    Route::put('/meals/{meal}', [MealController::class, 'update'])->middleware('permission:meals-edit')->name('meals.update');
    Route::delete('/meals/{meal}', [MealController::class, 'destroy'])->middleware('permission:meals-delite')->name('meals.destroy');

    //All Members Route List *
    Route::get('/members', [MemberController::class, 'index'])->middleware('permission:member-menu|member-list')->name('members.index');
    Route::get('/members/create', [MemberController::class, 'create'])->middleware('permission:member-create')->name('members.create');
    Route::post('/members', [MemberController::class, 'store'])->middleware('permission:member-create')->name('members.store');
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->middleware('permission:member-edit')->name('members.edit');
    Route::put('/members/{member}', [MemberController::class, 'update'])->middleware('permission:member-edit')->name('members.update');
    Route::delete('/members/{id}', [MemberController::class, 'destroy'])->middleware('permission:member-delite')->name('members.destroy');


    Route::get('/payments/create', [PaymentController::class, 'create'])->middleware('permission:payments-create')->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->middleware('permission:payments-create')->name('payments.store');
    Route::get('/payments/{payment}/show', [PaymentController::class, 'show'])->middleware('permission:payments-show')->name('payments.show');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->middleware('permission:payments-edit')->middleware('permission:markets-delite')->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->middleware('permission:payments-edit')->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->middleware('permission:payments-delite')->name('payments.destroy');

 //All Market Route List  *
    Route::get('/markets', [MarketController::class, 'index'])->middleware('permission:markets-menu|markets-list')->name('markets.index');
    Route::get('/markets/create', [MarketController::class, 'create'])->middleware('permission:markets-create')->name('markets.create');
    Route::post('/markets', [MarketController::class, 'store'])->middleware('permission:markets-create')->name('markets.store');
    Route::get('/markets/{market}/edit', [MarketController::class, 'edit'])->middleware('permission:markets-edit')->name('markets.edit');
    Route::put('/markets/{market}', [MarketController::class, 'update'])->middleware('permission:markets-edit')->name('markets.update');
    Route::delete('/markets/{market}', [MarketController::class, 'destroy'])->middleware('permission:markets-delite')->name('markets.destroy');

// all cook member Routes cooking_members *
    Route::get('/cooking-members', [CookingMemberController::class, 'index'])->middleware('permission:cooking_members-menu|cooking_members-list')->name('cooking-members.index');
    Route::get('/cooking-members/create', [CookingMemberController::class, 'create'])->middleware('permission:cooking_members-create')->name('cooking-members.create');
    Route::post('/cooking-members', [CookingMemberController::class, 'store'])->middleware('permission:cooking_members-create')->name('cooking-members.store');
    Route::get('/cooking-members/{cookingMember}/edit', [CookingMemberController::class, 'edit'])->middleware('permission:cooking_members-edit')->name('cooking-members.edit');
    Route::put('/cooking-members/{cookingMember}', [CookingMemberController::class, 'update'])->middleware('permission:cooking_members-edit')->name('cooking-members.update');
    Route::delete('/cooking-members/{cookingMember}', [CookingMemberController::class, 'destroy'])->middleware('permission:cooking_members-delite')->name('cooking-members.destroy');

 //All Market Route List *
    Route::get('/cooking-payments', [CookingPaymentController::class, 'index'])->middleware('permission:cooking_payments-menu|cooking_payments-list')->name('cooking-payments.index');
    Route::get('/cooking-payments/create', [CookingPaymentController::class, 'create'])->middleware('permission:cooking_payments-create')->name('cooking-payments.create');
    Route::post('/cooking-payments', [CookingPaymentController::class, 'store'])->middleware('permission:cooking_payments-create')->name('cooking-payments.store');
    Route::get('/cooking-payments/{cookingPayment}/edit', [CookingPaymentController::class, 'edit'])->middleware('permission:cooking_payments-edit')->name('cooking-payments.edit');
    Route::put('/cooking-payments/{cookingPayment}', [CookingPaymentController::class, 'update'])->middleware('permission:cooking_payments-edit')->name('cooking-payments.update');
    Route::delete('/cooking-payments/{cookingPayment}', [CookingPaymentController::class, 'destroy'])->middleware('permission:cooking_payments-delite')->name('cooking-payments.destroy');

    /*   **  */
    Route::get('/reports/monthly', [ReportController::class, 'monthlySummary'])->middleware('permission:monthlySummary-menu|monthlySummary-list')->name('reports.monthly');

});



