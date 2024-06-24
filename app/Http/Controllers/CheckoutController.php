<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);
    
        return view('checkout', compact('cartItems'));
    }
    
    public function processCheckout(Request $request)
    {
        $cartItems = session('cart', []);
        $paymentMethod = $request->input('payment_method');
        $userId = Auth::id();

        foreach ($cartItems as $item) {
            Order::create([
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total' => $item['price'] * $item['quantity'],
                'payment_method' => $paymentMethod,
                'user_id' => $userId,
            ]);
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
