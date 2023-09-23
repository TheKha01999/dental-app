<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\StoreServiceCategoryRequest;
use App\Http\Requests\Admin\Services\UpdateServiceCategoryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceCategoryController extends Controller
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

        $serviceCategories = DB::table('service_categories')
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);
        return view(
            'admin.pages.service_category.list',
            [
                'serviceCategories' => $serviceCategories,
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
        return view('admin.pages.service_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceCategoryRequest $request)
    {

        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $check = DB::table('service_categories')->insert([
            "name" => $request->name,
            "image" => $fileName ?? null,
            "status" => $request->status,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created successfully' : 'Created failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.service_categories.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serviceCategories = DB::table('service_categories')->find($id);
        return view('admin.pages.service_category.detail', ['serviceCategories' => $serviceCategories]);
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
    public function update(UpdateServiceCategoryRequest $request, string $id)
    {
        $service = DB::table('service_categories')->find($id);
        $oldImageFileName = $service->image;

        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }
        $check = DB::table('service_categories')->where('id', '=', $id)->update([
            "name" => $request->name,
            "image" => $fileName ?? $oldImageFileName,
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.service_categories.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = DB::table('service_categories')->find($id);
        $image = $service->image;

        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        $result = DB::table('service_categories')->delete($id);

        $message = $result ? 'Deleted successfully' : 'Deleted failed';
        //session flash
        return redirect()->route('admin.service_categories.index')->with('message', $message);
    }
}
