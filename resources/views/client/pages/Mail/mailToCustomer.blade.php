<h1>Order confirmation</h1>
<p>Hi, {{ $user->name }}</p>
<p>Thank you for ordering from Medcity.</p>
<p>Your order #{{ $order->id }} has been prepared.</p>
<p>Detailed order information is below in the following table</p>
@php
    $payment = 'COD';
    $newStatus = 'unpaid';
    if ($order->status === 'success') {
        $payment = 'VN PAY';
        $newStatus = 'paid';
    }
@endphp

<table border="1">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Payment method</th>
        <th>Total</th>
    </tr>
    @foreach ($order->order_items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ number_format($item->product_price, 0, '.', ',') }} VND</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $payment }}</td>
            <td>{{ number_format($item->product_price * $item->qty, 0, '.', ',') }} VND</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6">Total : {{ number_format($order->total, 0, '.', ',') }} VND</td>
    </tr>
</table>

<p>Payment status: {{ $newStatus }}</p>
<p>We hope you enjoyed your shopping experience with us and that you will visit us again soon.</p>
<p>Thank you,</p>
