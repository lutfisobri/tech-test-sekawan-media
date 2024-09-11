<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function() {
    Route::get('login', fn () => view('pages.auth.login'))->name('login');
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::prefix('driver')->group(function() {
        Route::get('/', [App\Http\Controllers\DriverController::class, 'index'])->name('driver');
        Route::get('create', [App\Http\Controllers\DriverController::class, 'create'])->name('driver.create');
        Route::post('create', [App\Http\Controllers\DriverController::class, 'store'])->name('driver.store');
        Route::get('edit/{driver}', [App\Http\Controllers\DriverController::class, 'edit'])->name('driver.edit');
        Route::put('edit/{driver}', [App\Http\Controllers\DriverController::class, 'update'])->name('driver.update');
        Route::get('delete/{driver}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('driver.destroy');
    });

    Route::prefix('vehicle')->group(function() {
        Route::get('/', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle');
        Route::get('create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
        Route::post('create', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicle.store');
        Route::get('edit/{vehicle}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
        Route::put('edit/{vehicle}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicle.update');
        Route::get('delete/{vehicle}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicle.destroy');
    });

    Route::prefix('booking')->group(function() {
        Route::get('/', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
        Route::get('create', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
        Route::post('create', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
        Route::get('edit/{booking}', [App\Http\Controllers\BookingController::class, 'edit'])->name('booking.edit');
        Route::put('edit/{booking}', [App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');
        Route::get('delete/{booking}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');
        Route::get('export', [App\Http\Controllers\BookingController::class, 'export'])->name('booking.export');
    });

    Route::prefix('task')->group(function() {
        Route::get('/', [App\Http\Controllers\ApprovalController::class, 'index'])->name('task');
        Route::get('approve/{approval}', [App\Http\Controllers\ApprovalController::class, 'approve'])->name('task.approve');
        Route::get('reject/{approval}', [App\Http\Controllers\ApprovalController::class, 'reject'])->name('task.reject');
    });

    Route::get('log', [App\Http\Controllers\LogController::class, 'index'])->name('log');
});