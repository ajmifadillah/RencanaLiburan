<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TravelPlanController;


// ==========================
// RUTE GUEST
// ==========================
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);
});


// ==========================
// RUTE YANG SUDAH LOGIN
// ==========================
Route::middleware('auth')->group(function () {

    // Home
    Route::get('/', [DestinationController::class, 'index'])
        ->name('home');


    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // ==========================
    // DESTINASI LIBURAN
    // ==========================
    Route::resource('destinations', DestinationController::class);


    // ==========================
    // RENCANA LIBURAN
    // ==========================
    Route::get(
        '/destinations/{destination}/travel-plans',
        [TravelPlanController::class, 'index']
    )->name('travel-plans.index');

    Route::get(
        '/destinations/{destination}/travel-plans/create',
        [TravelPlanController::class, 'create']
    )->name('travel-plans.create');

    Route::post(
        '/destinations/{destination}/travel-plans',
        [TravelPlanController::class, 'store']
    )->name('travel-plans.store');

    Route::get(
        '/travel-plans/{travelPlan}/edit',
        [TravelPlanController::class, 'edit']
    )->name('travel-plans.edit');

    Route::put(
        '/travel-plans/{travelPlan}',
        [TravelPlanController::class, 'update']
    )->name('travel-plans.update');

    Route::delete(
        '/travel-plans/{travelPlan}',
        [TravelPlanController::class, 'destroy']
    )->name('travel-plans.destroy');
});