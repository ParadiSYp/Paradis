<?php

namespace App\Http\Controllers;
Use App\Models\Order;
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
            'comment' => 'nullable|string|max:500'
        ]);

        // Обработка данных заказа (например, сохранение в базе данных)
        $order = new Order();
        $order->fill($validatedData);
        $order->user_id = auth()->id();
        // Сохраняем заказ
        $order->save();
        return redirect()->back()->with('success', 'Ваш заказ успешно оформлен!');
    }

    // Добавляем метод submitOrder
    public function submitOrder(Request $request)
    {
        // Здесь вы можете обработать заказ аналогично submitForm
        return view('checkout.index');
    }
}