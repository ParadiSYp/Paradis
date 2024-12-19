<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('reviews'); // Путь к вашему представлению
   
    }
}
