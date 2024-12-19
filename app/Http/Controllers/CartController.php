<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(): View
    {
        \Log::info('Retrieving cart items for user ' . Auth::id());
        
        $cartItems = Cart::where('user_id', Auth::id())
            ->with(['products'])
            ->get();
    
        \Log::info('Retrieved cart items:', ['items' => $cartItems]);
    
        return view('checkout.basket', compact('cartItems'));
    }
    

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:dishes,cart_id',
        ]);

        $validatedData['amount'] = 1;

        Cart::create($validatedData);

        return redirect()->back();
    }

    public function destroy(Cart $cart): RedirectResponse
    {
        $cart->delete();

        return redirect()->route('carts.index');
    }
}
