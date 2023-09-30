<?php

namespace App\Http\Controllers\Client\CheckOut;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->status = Order::STATUS_PENDING;

        $cart = session()->get('cart', []);
        $order->save();
        $total = 0;

        foreach ($cart as $productId => $item) {
            $orderItems = new OrderItem;
            $orderItems->order_id = $order->id;
            $orderItems->product_name = $item['name'];
            $orderItems->product_price = $item['price'];
            $orderItems->qty = $item['qty'];
            $orderItems->product_id = $productId;
            $orderItems->save();

            $total = $item['price'] * $item['qty'];
        }
        $order->subtotal = $total;
        $order->total = $total;
        $order->save();
    }
}
