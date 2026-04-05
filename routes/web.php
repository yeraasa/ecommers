<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageProductss;
use App\Http\Controllers\ManageOrders;
use App\Http\Controllers\SalesStatistic;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailProductsController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/', [AuthController::class, 'index'])->name('auth.index');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::resource('cart', CartController::class)->except(['index']);

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // web.php
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// product management CRUD
Route::get('/manage-products', [ManageProductss::class, 'index'])->name('manage-products.index');
Route::get('/manage-products/create', [ManageProductss::class, 'create'])->name('manage-products.create');
Route::post('/manage-products', [ManageProductss::class, 'store'])->name('manage-products.store');
Route::get('/manage-products/{id}/edit', [ManageProductss::class, 'edit'])->name('manage-products.edit');
Route::put('/manage-products/{id}', [ManageProductss::class, 'update'])->name('manage-products.update');
Route::delete('/manage-products/{id}', [ManageProductss::class, 'destroy'])->name('manage-products.destroy');

// legacy add-product aliases
Route::get('/add-products', function () {
    return redirect()->route('manage-products.create');
});
Route::post('/add-products', function () {
    return redirect()->route('manage-products.store');
});

Route::get('/manage-orders', [ManageOrders::class, 'index'])->name('manage-orders.index');
Route::post('/manage-orders/{order}/status', [ManageOrders::class, 'updateStatus'])->name('manage-orders.updateStatus');
Route::get('/sales-statistic', [SalesStatistic::class, 'index'])->name('sales-statistic.index');
route::get('/signin', [AuthController::class, 'signin'])->name('auth.signin');
route::get('/signup', [AuthController::class, 'signup'])->name('auth.signup');
route::post('/signin', [AuthController::class, 'signinPost'])->name('auth.signin.post');
route::post('/signup', [AuthController::class, 'signupPost'])->name('auth.signup.post');

Route::get('/detail-products', [DetailProductsController::class, 'index'])->name('detail-products.index');

