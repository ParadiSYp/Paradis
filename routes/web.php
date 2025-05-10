<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BasketsController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CommentController;


Auth::routes();

// Главная страница
Route::get('/', function () {
    return view('one'); // Это ваша главная страница
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/menu', [DishController::class, 'index'])->name('dishes.index');

Route::middleware('auth')->group(function () {

Route::get('/orderout', [OrderController::class, 'showForm'])->name('orderout.form');
Route::post('/orderout', [OrderController::class, 'submitForm'])->name('orderout.submit');
Route::get('/check', [BasketController::class, 'basket'])->name('checkout.basket');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


});
