<?php

namespace App\Http\Controllers;

use App\Models\Dish;
Dish::all();
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all()->groupBy('category'); // Группируем блюда по категориям
        return view('dishes.index', compact('dishes')); // Замените 'your_view_name' на имя вашего представления
    }
    
}