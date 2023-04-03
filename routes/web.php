<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.homepage');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/aboutus', function () {
    return view('pages.aboutus');
})->middleware(['auth', 'verified'])->name('aboutus');




Route::get('/products', [ProductController::class,'get_products'])->middleware(['auth', 'verified'])->name('products');

Route::get('/orders', [ProductController::class,'get_orders'])->middleware(['auth', 'verified'])->name('orders');

Route::post('/order', [ProductController::class, 'get_order'])->name('get-order');
Route::post('/remove-order-item', [ProductController::class, 'remove_order_item'])->name('remove-order-item');
Route::post('/purchase-order', [ProductController::class, 'purchase_order'])->name('purchase-order');

Route::post('/createOrder', [ProductController::class, 'createOrder'])->name('create-order');

Route::get('/wishlist', [ProductController::class,'get_wish_list'])->middleware(['auth', 'verified'])->name('wishlist');
Route::post('/remove-wishlist', [ProductController::class, 'remove_wishlist'])->name('remove-wishlist');
Route::post('/add-wishlist', [ProductController::class, 'add_wishlist'])->name('add-wishlist');

Route::get('/home', function () {
    return view('pages.homepage');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/summary', function () {
    return view('pages.summarypage');
})->middleware(['auth', 'verified'])->name('summary');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';