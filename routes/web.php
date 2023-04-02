<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', [ProductController::class,'get_products'])->middleware(['auth', 'verified'])->name('products');

Route::get('/orders', [ProductController::class,'get_orders'])->middleware(['auth', 'verified'])->name('orders');
Route::post('/get-order', [ProductController::class, 'createOrder'])->name('get-order');

Route::post('/createOrder', [ProductController::class, 'createOrder'])->name('create-order');

Route::get('/home', function () {
    return view('pages.homepage');
})->middleware(['auth', 'verified'])->name('home');

// Route::get('/cart', function () {
//     return view('pages.cartpage');
// })->middleware(['auth', 'verified'])->name('cart');

Route::get('/summary', function () {
    return view('pages.summarypage');
})->middleware(['auth', 'verified'])->name('summary');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
