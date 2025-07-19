<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    if (Auth::check()) {
        return app(HomeController::class)->index();
    }
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


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

use App\Http\Controllers\UserController;

Route::get('/vendors/{user}', [UserController::class, 'show'])->name('vendors.show');



require __DIR__.'/auth.php';
