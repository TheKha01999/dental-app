<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoriesRequest;
use App\Http\Requests\UpdateProductCategoriesRequest;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoriesController extends Controller
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
        $itemPerPage = config('my-config.item-per-pages');
        $page = $request->page ?? 1;
        $stt = ($page *  $itemPerPage) - ($itemPerPage - 1);

        $productCategories = DB::table('product_categories')
            ->where('name', 'like', '%' . $keyword . '%')
            ->whereNull('deleted_at')
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);
        return view(
            'admin.pages.product_categories.list',
            [
                'productCategories' => $productCategories,
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

        return view('admin.pages.product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoriesRequest $request)
    {
        $check = DB::table('product_categories')->insert([
            "name" => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $message = $check ? 'Created successfully !' : 'Created failed !';
        return redirect()->route('admin.product_categories.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productCategories = DB::table('product_categories')->find($id);
        return view('admin.pages.product_categories.detail', ['productCategories' => $productCategories]);
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
    public function update(UpdateProductCategoriesRequest $request, string $id)
    {

        $check = DB::table('product_categories')->where('id', '=', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'updated_at' => Carbon::now(), //lưu ý chỗ này nên lúc nào cũng successfully
        ]);

        $message = $check  ? 'Updated successfully' : 'Updated failed';
        return redirect()->route('admin.product_categories.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productCategory = ProductCategory::find((int)$id);
        $productCategory->status = 0;
        $productCategory->save();

        $productCategory->delete();


        return redirect()->route('admin.product_categories.index')->with('message', 'Deleted successfully');
    }
}
