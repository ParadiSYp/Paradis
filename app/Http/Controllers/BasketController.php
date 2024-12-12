<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        return view('checkout.basket'); // Путь к вашему представлению
   
    }
}

