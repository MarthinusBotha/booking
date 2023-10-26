<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\{
    DashboardController,
    BookingItemController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookingItemController::class, 'bookingItems'])->name('bookingItems');
Route::get('/make-booking/{id}', [BookingItemController::class, 'makeBooking'])->name('make-booking');

Route::get('/dashboard', [DashboardController::class, 'viewBookings'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/view-booking/{id}', [DashboardController::class, 'viewBooking'])->middleware(['auth', 'verified'])->name('view-booking');
Route::put('/dashboard/update-booking', [DashboardController::class, 'updateBooking'])->middleware(['auth', 'verified'])->name('update-booking');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
