<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('client.pages.Cart.cart', ['cart' => $cart]);
    }
    public function addToCart($productId, $qty)
    {
        $cart = session()->get('cart') ?? [];
        $quantity = $qty;
        $product = Product::findOrFail($productId);
        $product_remain = 0;
        if ($cart !== []) {
            $product_qty = $product->qty - ($cart[$productId]['qty'] ?? 0);
        } else {
            $product_qty = $product->qty;
        }
        // $product = DB::table('products')->find($productId);

        if ($quantity > $product_qty) {
            return response()->json(
                [
                    'message' => 'Add product to cart fail. Only ' . $product_qty . ' products left in stock',
                    'result' => false,
                ]
            );
        }


        $imagesLink = is_null($product->image) || !file_exists('images/' . $product->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $product->image);

        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $imagesLink,
            'qty' => ($cart[$productId]['qty'] ?? 0) + $quantity
        ];
        $product_remain = $product->qty - $cart[$productId]['qty'];

        session()->put('cart', $cart);
        $total_items = count($cart);
        return response()->json(
            [
                'message' => 'Add product to cart success',
                'total_items' => $total_items,
                'result' => true,
                'qty_remain' => $product_remain
            ]
        );
    }
    public function deleteItem($productId)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        $total_items = count($cart);
        $total_price = $this->calculateTotalPrice($cart);
        return response()->json(
            [
                'message' => 'Delete item success',
                'total_items' => $total_items,
                'total_price' => $total_price,
            ]
        );
    }
    public function calculateTotalPrice($cart): float
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }
    public function updateItem($productId, $qty)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['qty'] = $qty;
            session()->put('cart', $cart);
        }

        $total_price = $this->calculateTotalPrice($cart);
        // $total_items = count($cart);
        return response()->json([
            'message' => 'Update item success',
            'total_price' => $total_price,
            // 'total_items' => $total_items
        ]);
    }
    public function emmptyCart()
    {
        session()->put('cart', []);
        return response()->json([
            'message' => 'Cart delete success',
            'total_price' => 0,
            'total_items' => 0,
        ]);
    }
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('client.pages.Checkout.checkout', ['cart' => $cart]);
    }
}
