<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dish;
class DishController extends Controller
{
    public function index()
    {
        // Извлекаем все блюда из базы данных
        $dishes = Dish::all();
        $dishes = $dishes->groupBy('category');
        // dd($dishes);
        // Возвращаем представление с данными
        return view('dishes.index', compact('dishes'));
    }
}
