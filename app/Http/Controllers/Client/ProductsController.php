<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public $blogCategories;

    public function __construct()
    {
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $this->blogCategories = $blogCategories;
    }
    public function index()
    {
        $products = DB::table('products')
            ->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $productCategories = DB::table('product_categories')->where('status', '=', '1')->get();

        return view(
            'client.pages.Product.list',
            [
                'productCategories' => $productCategories,
                'products' => $products,
                'blogCategories' => $this->blogCategories
            ]
        );
    }
    public function detail($id)
    {
        $products = DB::table('products')
            ->where('product_categories_id', '=', $id)
            ->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $productCategories = DB::table('product_categories')->get();

        return view(
            'client.pages.Product.list',
            [
                'productCategories' => $productCategories,
                'products' => $products,
                'blogCategories' => $this->blogCategories
            ]
        );
    }
}
