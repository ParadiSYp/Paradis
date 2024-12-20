<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
Auth::routes();

// Главная страница
Route::get('/', function () {
    return view('one'); // Это ваша главная страница
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/menu', [DishController::class, 'index'])->name('dishes.index');

Route::middleware('auth')->group(function () {
    
Route::post('/orderout', [OrderController::class, 'submitForm'])->name('orderout.submit');
Route::post('/orderout/submit', [OrderController::class, 'submitForm'])->name('orderout.submit');
Route::get('/orderout', [OrderController::class, 'showForm'])->name('orderout.form');

Route::get('/check', [BasketController::class, 'basket'])->name('checkout.basket');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
});

Route::get('/basket/index', 'CartController@index')->name('basket.index');
Route::get('/basket/checkout', 'CartController@checkout')->name('basket.checkout');


Route::get('/check', [CartController::class, 'index'])->name('carts.index')->middleware('auth');
Route::post('/orderout', [CartController::class, 'store'])->name('carts.store')->middleware('auth');
Route::delete('/check/{cart}', [CartController::class, 'destroy'])->name('carts.destroy')->middleware('auth');



Route::get('/admin', function() {
    return view('admin');
})->name('admin.dashboard')->middleware('auth');

Route::get('/admin/products/edit', [CartController::class, 'edit'])->name('users.products.edit');
Route::delete('/dishes/{dish}', [CartController::class, 'deletes'])->name('dishes.destroy');


Route::post('/admin/categories/update', [CategoryController::class, 'updateCategory'])->name('categories.update');

Route::get('/admin/users', [CartController::class, 'listUsers'])->name('users.users.list');


Route::get('/admin/orders', [CartController::class, 'listOrders'])->name('users.orders.list');
