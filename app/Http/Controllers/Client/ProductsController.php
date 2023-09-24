<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //Navbar
    public $blogCategories;
    public $serviceCategories;
    ///////////////
    public $productCategories;

    public function __construct()
    {
        //Navbar
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();

        $this->blogCategories = $blogCategories;
        $this->serviceCategories = $serviceCategories;
        ///////////////////
        $productCategories = DB::table('products')
            ->select(DB::raw('count(product_categories_id) as totalProduct'), 'product_categories.*')
            ->where('products.status', '=', '1')
            ->where('product_categories.status', '=', '1')
            ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->groupBy('product_categories.id')
            ->get();
        $this->productCategories = $productCategories;
    }
    public function index()
    {
        $products = DB::table('products')
            ->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        // $productCategories = DB::table('product_categories')->where('status', '=', '1')->get();

        return view(
            'client.pages.Product.list',
            [
                'productCategories' => $this->productCategories,
                'products' => $products,
                'blogCategories' => $this->blogCategories,
                'serviceCategories' => $this->serviceCategories
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

        // $productCategories = DB::table('product_categories')->get();


        return view(
            'client.pages.Product.list',
            [
                'productCategories' => $this->productCategories,
                'products' => $products,
                'blogCategories' => $this->blogCategories,
                'serviceCategories' => $this->serviceCategories
            ]
        );
    }

    public function showSingle($id)
    {
        $product = DB::table('products')
            ->select('products.*', 'product_categories.name as product_category_name')
            ->where('products.id', '=', $id)
            ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->get()
            ->first();
        // dd($product);
        return view(
            'client.pages.Product.singleProduct',
            [
                'product' => $product,
                'blogCategories' => $this->blogCategories,
                'serviceCategories' => $this->serviceCategories
            ]
        );
    }
}
