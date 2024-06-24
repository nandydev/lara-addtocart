<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders;

        return view('orders.index', compact('orders'));

      
    }

    public function getorders(){

        $orders = Order::all();
        // dd($orders);
        return view('admin.orders', compact('orders'));
    }
}

