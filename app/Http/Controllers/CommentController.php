<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all(); // Получаем все отзывы
        return view('one', compact('comments')); // Передаем отзывы в представление
    }

    public function store(Request $request)
{
    $request->validate([
        'author' => 'required|alpha|max:255',
        'content' => 'required|max:1000',
    ]);

    Comment::create($request->only(['author', 'content']));

    return redirect()->back(); // Перенаправляем обратно на главную страницу
}
}
