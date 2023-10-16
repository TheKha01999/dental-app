<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowOrderController extends Controller
{
    public function showOrders()
    {
        $orders = DB::table('orders')
            ->select('orders.*', 'users.name as customer')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($orders);
        return view('admin.pages.orders.order', ['orders' => $orders]);
    }
    public function showOrderItems($id)
    {
        $order = Order::findOrFail($id);

        $orderItems = DB::table('order_items')
            ->where('order_id', $order->id)
            ->get();

        return view('admin.pages.orders.order_item', ['orderItems' => $orderItems]);
    }
    public function showOrderPayments($id)
    {
        $order = Order::findOrFail($id);
        $orderPayments = DB::table('order_payment_methods')
            ->where('order_id', $order->id)
            ->get();
        if (!$orderPayments) abort(404);
        return view('admin.pages.orders.payment', ['orderPayments' => $orderPayments]);
    }
    public function destroy(string $id)
    {
        $order = Order::findOrFail((int)$id);

        $order->delete();


        return redirect()->route('admin.orders')->with('message', 'Deleted successfully');
    }
    public function restore(string $id)
    {
        $order = Order::withTrashed()->findOrFail($id);

        $order->restore();

        return redirect()->route('admin.orders')->with('message', 'Restore successfully');
    }

    public function destroyOrderItem(string $id)
    {
        // dd(1);
        $order = OrderItem::findOrFail((int)$id);

        $order->delete();


        return redirect()->route('admin.order-items', ['order' => $order->order_id])->with('message', 'Deleted successfully');
    }
    public function restoreOrderItem(string $id)
    {
        $order = OrderItem::withTrashed()->findOrFail($id);

        $order->restore();

        return redirect()->route('admin.order-items', ['order' => $order->order_id])->with('message', 'Restore successfully');
    }
    public function destroyPayment(string $id)
    {
        // dd(1);
        $payment = OrderPaymentMethod::findOrFail((int)$id);

        $payment->delete();


        return redirect()->route('admin.payments', ['order' => $payment->order_id])->with('message', 'Deleted successfully');
    }
    public function restorePayment(string $id)
    {
        $payment = OrderPaymentMethod::withTrashed()->findOrFail($id);

        $payment->restore();

        return redirect()->route('admin.payments', ['order' => $payment->order_id])->with('message', 'Restore successfully');
    }

    public function update(string $id)
    {
        $order = Order::findOrFail($id);
        $payment = $order->order_payment_methods[0];
        $payment->status = OrderPaymentMethod::STATUS_SUCCESS;
        // dd($payment);
        $order->status = Order::STATUS_SUCCESS;
        $payment->save();
        $order->save();
        return redirect()->route('admin.orders');
    }
}
