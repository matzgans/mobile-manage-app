<?php

use App\Http\Controllers\Bendahara\BuyDataController as BendaharaBuyDataController;
use App\Http\Controllers\Bendahara\SellDataController as BendaharaSellDataController;
use App\Http\Controllers\BuyDataController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerOrdersController;
use App\Http\Controllers\Director\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellDataController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:sales'])->name('sales.')->prefix('sales')->group(function () {
    Route::resource('car', CarController::class);
    Route::resource('sales', SaleController::class);
});
Route::middleware(['auth', 'role:director'])->name('director.')->prefix('director')->group(function () {
    Route::resource('employee', EmployeeController::class);
    Route::get('buy', [BuyDataController::class, 'index'])->name('buy.index');
    Route::get('sell', [SellDataController::class, 'index'])->name('sell.index');
});
Route::middleware(['auth', 'role:frontdesk'])->name('frontdesk.')->prefix('frontdesk')->group(function () {
    Route::resource('customer_orders', CustomerOrdersController::class);
});
Route::middleware(['auth', 'role:frontdesk'])->name('frontdesk.')->prefix('frontdesk')->group(function () {
    Route::resource('customer_orders', CustomerOrdersController::class);
});
Route::middleware(['auth', 'role:sparepart'])->name('sparepart.')->prefix('sparepart')->group(function () {
    Route::get('buy', [BuyDataController::class, 'index'])->name('buy.index');
});
Route::middleware(['auth', 'role:bendahara'])->name('bendahara.')->prefix('bendahara')->group(function () {
    Route::resource('sell', BendaharaSellDataController::class);
    Route::resource('buy', BendaharaBuyDataController::class);
});

require __DIR__ . '/auth.php';
