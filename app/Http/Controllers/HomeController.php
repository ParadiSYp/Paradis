<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable // Указываем тип возвращаемого значения
    {
        // Извлекаем все блюда из базы данных
        $dishes = Dish::all();

        // Возвращаем представление с данными для всех блюд
        return view('one', compact('dishes'));
    }
}