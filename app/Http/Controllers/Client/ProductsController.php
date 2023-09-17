<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // $sortName = $request->name ?? null;
        // dd($sortName);
        $keyword = $request->keyword;
        $products = DB::table('products')
            // ->select('products.*', 'product_categories.name as product_category_name')
            // ->where('products.name', 'like', '%' . $keyword . '%')
            ->where('name', 'like', '%' . $keyword . '%')
            // ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->orderBy('created_at', 'desc')
            ->get();


        $productCategories = DB::table('product_categories')->get();
        // $products = DB::table('products')->where('name', '=', $sortName)->get();
        // dd($products);
        // return view('client.pages.Product.list', ['products' => $products]);
        return view('client.pages.Product.list', ['productCategories' => $productCategories, 'products' => $products]);
    }
}
