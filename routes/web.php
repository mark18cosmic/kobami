<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use Illuminate\Support\Facades\Auth;


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->prefix('vendor')->group(function () {
    Route::get('/products', [VendorProductController::class, 'index'])->name('vendor.products.index');
    Route::get('/products/create', [VendorProductController::class, 'create'])->name('vendor.products.create');
    Route::post('/products', [VendorProductController::class, 'store'])->name('vendor.products.store');
    Route::get('/products/{product}/edit', [VendorProductController::class, 'edit'])->name('vendor.products.edit');
    Route::put('/products/{product}', [VendorProductController::class, 'update'])->name('vendor.products.update');
    Route::delete('/products/{product}', [VendorProductController::class, 'destroy'])->name('vendor.products.destroy');

});


require __DIR__.'/auth.php';
