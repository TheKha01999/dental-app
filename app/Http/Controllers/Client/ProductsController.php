<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {

        $products = DB::table('products')
            ->orderBy('created_at', 'desc')
            ->get();


        $productCategories = DB::table('product_categories')->get();

        return view('client.pages.Product.list', ['productCategories' => $productCategories, 'products' => $products]);
    }
    public function detail($id)
    {
        $products = DB::table('products')
            ->where('product_categories_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $productCategories = DB::table('product_categories')->get();

        return view('client.pages.Product.list', ['productCategories' => $productCategories, 'products' => $products]);
    }
}
