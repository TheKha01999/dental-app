<h1>Order # {{ $order->id }}</h1>
<div>Name : {{ $user->name }}</div>
<div>Phone : {{ $user->phone }}</div>
<div>Address : {{ $order->address }}</div>
<div>Note : {{ $order->note }}</div>
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
