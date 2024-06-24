<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\Director\EmployeeController;
use App\Http\Controllers\ProfileController;
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
    Route::resource('sales', CarController::class);
});
Route::middleware(['auth', 'role:director'])->name('director.')->prefix('director')->group(function () {
    Route::resource('employee', EmployeeController::class);
});

require __DIR__ . '/auth.php';
