<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public $productCategories;

    public function __construct()
    {
        $productCategories = DB::table('products')
            ->select(DB::raw('count(product_categories_id) as totalProduct'), 'product_categories.*')
            ->where('products.status', '=', '1')
            ->where('product_categories.status', '=', '1')
            ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->groupBy('product_categories.id')
            ->get();

        $this->productCategories = $productCategories;
    }
    public function index(Request $request)
    {
        // $products = DB::table('products')
        //     ->where('status', '=', '1')
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        if ($request->sortBy === '2') {
            $products = DB::table('products')
                ->select('products.*', 'product_categories.status')
                ->where('products.status', '=', '1')
                ->where('product_categories.status', '=', '1')
                ->where('products.name', 'like', '%' . $request->keyword . '%')
                ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
                ->orderBy('products.price', 'desc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
            // dd($products);
        } else if ($request->sortBy === '3') {
            $products = DB::table('products')
                ->select('products.*', 'product_categories.status')
                ->where('products.status', '=', '1')
                ->where('product_categories.status', '=', '1')
                ->where('products.name', 'like', '%' . $request->keyword . '%')
                ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
                ->orderBy('products.price', 'asc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
        } else if ($request->sortBy === '1') {
            $products = DB::table('products')
                ->select('products.*', 'product_categories.status')
                ->where('products.status', '=', '1')
                ->where('product_categories.status', '=', '1')
                ->where('products.name', 'like', '%' . $request->keyword . '%')
                ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
                ->orderBy('products.created_at', 'asc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
        } else {

            $products = DB::table('products')
                ->select('products.*', 'product_categories.status')
                ->where('products.status', '=', '1')
                ->where('product_categories.status', '=', '1')
                ->where('products.name', 'like', '%' . $request->keyword . '%')
                ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
                ->orderBy('products.created_at', 'desc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
        }

        // dd($products);
        // $productCategories = DB::table('product_categories')->where('status', '=', '1')->get();

        $bestSellers = DB::table('products')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.id, SUM(order_items.qty) as total')
            ->groupBy('products.id')
            ->orderBy('total', 'desc')
            ->take(3)
            ->get();

        $topProducts = [];
        foreach ($bestSellers as $key => $bestSeller) {
            $p = Product::findOrFail($bestSeller->id);
            $topProducts[] = $p;
        }
        // dd($topProducts);

        return view(
            'client.pages.Product.list',
            [
                'productCategories' => $this->productCategories,
                'products' => $products,
                'topProducts' => $topProducts,
                'sortBy' => $request->sortBy,
                'state' => 0,
                'keyword' => $request->keyword
            ]
        );
    }
    public function detail(Request $request, $id)
    {
        $productCategories = ProductCategory::findOrFail($id);

        if ($request->sortBy === '2') {
            $products = DB::table('products')
                ->where('product_categories_id', '=', $id)
                ->where('status', '=', '1')
                ->where('name', 'like', '%' . $request->keyword . '%')
                ->orderBy('price', 'desc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
            // dd($products);
        } else if ($request->sortBy === '3') {
            $products = DB::table('products')
                ->where('product_categories_id', '=', $id)
                ->where('status', '=', '1')
                ->where('name', 'like', '%' . $request->keyword . '%')
                ->orderBy('price', 'asc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
        } else if ($request->sortBy === '1') {
            $products = DB::table('products')
                ->where('product_categories_id', '=', $id)
                ->where('status', '=', '1')
                ->where('name', 'like', '%' . $request->keyword . '%')
                ->orderBy('created_at', 'asc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
        } else {

            $products = DB::table('products')
                ->where('product_categories_id', '=', $id)
                ->where('status', '=', '1')
                ->where('name', 'like', '%' . $request->keyword . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(config('my-config.item-per-pages'));
            $products->appends(['sortBy' => $request->sortBy]);
            if ($request->page > $products->lastPage()) abort(404);
        }


        // $products = DB::table('products')
        //     ->where('product_categories_id', '=', $id)
        //     ->where('status', '=', '1')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(config('my-config.item-per-pages'));
        // ->get();

        $bestSellers = DB::table('products')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.id, SUM(order_items.qty) as total')
            ->groupBy('products.id')
            ->orderBy('total', 'desc')
            ->take(3)
            ->get();

        $topProducts = [];
        foreach ($bestSellers as $key => $bestSeller) {
            $p = Product::findOrFail($bestSeller->id);
            $topProducts[] = $p;
        }

        return view(
            'client.pages.Product.list',
            [
                'productCategories' => $this->productCategories,
                'products' => $products,
                'topProducts' => $topProducts,
                'sortBy' => $request->sortBy,
                'state' => 1,
                'id' => $id,
                'keyword' => $request->keyword
            ]
        );
    }

    public function showSingle($slug)
    {
        $product = DB::table('products')
            ->select('products.*', 'product_categories.name as product_category_name')
            ->where('products.slug', '=', $slug)
            ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->get()
            ->first();
        if (!$product) abort(404);

        // $relatedProduct 
        $relatedProducts = DB::table('products')
            ->where('product_categories_id', $product->product_categories_id)
            ->where('id', '<>', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'client.pages.Product.singleProduct',
            [
                'product' => $product,
                'relatedProducts' => $relatedProducts,
            ]
        );
    }
}
