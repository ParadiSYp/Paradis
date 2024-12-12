<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showForm()
    {
        return view('checkout.index'); // Путь к вашему представлению
    }

    public function submitForm(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'option' => 'required|string',
            'address' => 'required|string|max:255',
            'entrance' => 'required|string|max:10',
            'intercom' => 'required|string|max:10',
            'floor' => 'required|string|max:10',
            'apartment' => 'required|string|max:10',
            'private_home' => 'nullable|boolean',
            'comment' => 'nullable|string|max:500',
            'save_address' => 'nullable|boolean',
            'payment_method' => 'required|string',
        ]);

        // Обработка данных заказа (например, сохранение в базе данных)

        return redirect()->back()->with('success', 'Ваш заказ успешно оформлен!');
    }
}