<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Order;
class CartController extends Controller
{
    public function index(): View
    {
        $cartItems = Cart::where('user_id', Auth::id())->with(['dish.images'])->get();
        
        return view('checkout.basket', compact('cartItems'));
    }
    
    

    public function store(Request $request): RedirectResponse
    {

        
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:dishes,id', 
        ]);
    
        $validatedData['product_id'] = $request->input('product_id');
        $validatedData['user_id'] = Auth::id();
        $validatedData['amount'] = 1;
        Cart::create($validatedData);
        return redirect()->route('dishes.index')->with('success', 'Товар добавлен в корзину!');

    }

    public function destroy(Cart $cart): RedirectResponse
    {
        $cart->delete();

        return redirect()->route('carts.index');
    }
    public function show()
{
    $cartItems = Cart::content();
    
    return view('cart.show', compact('cartItems'));
}
public function edit(Dish $product): View
{
    $categories = Dish::all();

    return view('edit.AllOrders', compact( 'categories'));
}

public function deletes(Dish $dish): RedirectResponse
{
    $dish->delete();

    return redirect()->back()->with('success', 'Блюдо успешно удалено.');
}
public function updateCategory(Request $request)
{
    $id = $request->input('id');
    
    // Получаем категорию из базы данных
    $category = Category::find($id);
    
    if ($category) {
        $category->name = $request->input('name', $category->name);
        $category->description = $request->input('description', $category->description);
        $category->price = $request->input('price', $category->price);
        $category->category = $request->input('category', $category->category);
        
        // Сохраняем изменения в базе данных
        $category->save();
        
        return response()->json(['success' => true]);
    }
    
    return response()->json(['error' => 'Категория не найдена'], 404);
}
public function listUsers()
{
    $users = User::all();
    return view('edit.userAll', compact('users'));
}

public function listOrders()
{
    $orders = Order::all();
    return view('edit.orderAll', compact('orders'));
}
}
