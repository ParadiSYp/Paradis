<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DishController;



// Главная страница
Route::get('/', function () {
    return view('one'); // Это ваша главная страница
});
// Страница меню
Route::get('/menu', function () {
    return view('menu'); // Это ваша страница меню
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/', [DishController::class, 'index'])->name('dishes.index');
