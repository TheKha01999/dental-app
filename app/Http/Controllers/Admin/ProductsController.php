<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //SEARCH
        $keyword = $request->keyword;
        $sortBy = $request->sortBy ?? '';
        $sort = $sortBy  === 'oldest' ? 'asc' : 'desc';

        // Index
        $itemPerPage = 3;
        $page = $request->page ?? 1;
        $stt = ($page *  $itemPerPage) - ($itemPerPage - 1);

        //Query Builder
        $products = DB::table('products')
            ->select('products.*', 'product_categories.name as product_category_name')
            ->where('products.name', 'like', '%' . $keyword . '%')
            ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);

        return view(
            'admin.pages.products.list',
            [
                'products' => $products,
                'sortBy' => $sortBy,
                'keyword' => $keyword,
                'stt' => $stt
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = DB::table('product_categories')->where('status', '=', '1')->get();

        return view('admin.pages.products.create', ['productCategories' => $productCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $check = DB::table('products')->insert([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "information" => $request->information,
            "qty" => $request->qty,
            "status" => $request->status,
            "product_categories_id" => $request->product_categories_id,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Created failed';
        //session flash
        return redirect()->route('admin.products.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = DB::table('products')->find($id);
        $productCategories = DB::table('product_categories')->where('status', '=', 1)->get();
        // dd($productCategories);
        return view('admin.pages.products.detail', ['product' => $product, 'productCategories' => $productCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, string $id)
    {
        $product = DB::table('products')->find($id);
        $oldImageFileName = $product->image;

        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }

        $check = DB::table('products')->where('id', '=', $id)->update([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "information" => $request->information,
            "qty" => $request->qty,
            "status" => $request->status,
            "product_categories_id" => $request->product_categories_id,
            "image" => $fileName ?? $oldImageFileName,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.products.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = DB::table('products')->find($id);
        $image = $product->image;

        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        $result = DB::table('products')->delete($id);

        $message = $result ? 'Deleted successfully' : 'Deleted failed';
        //session flash
        return redirect()->route('admin.products.index')->with('message', $message);
    }
    public function createSlug(Request $request)
    {
        return response()->json(['slug' => str::slug($request->name, '-')]);
    }
}
