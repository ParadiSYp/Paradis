<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function updateCategory(Request $request)
    {
        $id = $request->input('id');

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Категория не найдена'], 404);
        }

        $category->update([
            'name' => $request->input('name', $category->name),
            'description' => $request->input('description', $category->description),
            'price' => $request->input('price', $category->price),
            'category' => $request->input('category', $category->category),
        ]);

        return response()->json(['success' => true]);
    }

}
