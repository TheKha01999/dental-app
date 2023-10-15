<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\StoreServiceRequest;
use App\Http\Requests\Admin\Services\UpdateServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
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
        $status = $request->status ?? '';
        // Index
        $itemPerPage = config('my-config.item-per-pages');
        $page = $request->page ?? 1;
        $stt = ($page *  $itemPerPage) - ($itemPerPage - 1);

        $filter = [];
        if (!empty($keyword)) {
            $filter[] = ['service_categories.name', 'like', '%' . $keyword . '%'];
        }
        if ($status !== '') {
            $filter[] = ['services.status', $status];
        }

        //Query Builder
        $services = DB::table('services')
            ->select('services.*', 'service_categories.name as service_category_name')
            ->where($filter)
            ->leftJoin('service_categories', 'services.service_categories_id', '=', 'service_categories.id')
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);

        return view(
            'admin.pages.services.list',
            [
                'services' => $services,
                'sortBy' => $sortBy,
                'keyword' => $keyword,
                'stt' => $stt,
                'status' => $status
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        return view('admin.pages.services.create', ['serviceCategories' => $serviceCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }


        $check = DB::table('services')->insert([
            "title" => $request->title,
            "slug" => $request->slug,
            "content" => $request->content,
            "description" => $request->description,
            "status" => $request->status,
            "service_categories_id" => $request->service_categories_id,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Created failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.services.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = DB::table('services')->find($id);
        $serviceCategories = DB::table('service_categories')->where('status', '=', 1)->get();
        // dd($productCategories);
        return view('admin.pages.services.detail', ['service' => $service, 'serviceCategories' => $serviceCategories]);
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
    public function update(UpdateServiceRequest $request, string $id)
    {
        //Destroy image of dont use again old image in source file
        $service = DB::table('services')->find($id);
        $oldImage = $service->image;


        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
                unlink('images/' . $oldImage);
            }
        }

        $check = DB::table('services')->where('id', '=', $id)->update([
            "title" => $request->title,
            "slug" => $request->slug,
            "content" => $request->content,
            "description" => $request->description,
            "status" => $request->status,
            "service_categories_id" => $request->service_categories_id,
            "image" => $fileName ?? $oldImage,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.services.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $service = Service::find((int)$id);
        $serviceCategory = ServiceCategory::find($service->service_categories_id);
        $serviceCategory->status = 0;
        $service->status = 0;
        $service->save();
        $serviceCategory->save();

        $service->delete();


        //session flash
        return redirect()->route('admin.services.index')->with('message', 'Deleted successfully');
    }
    public function createSlug(Request $request)
    {
        return response()->json(['slug' => str::slug($request->title, '-')]);
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileOrginialName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('upload')->getClientOriginalExtension();
            $request->file('upload')->move(public_path('images'),  $fileName);

            $url = asset('images/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function restore(string $id)
    {
        $service = Service::withTrashed()->find($id);
        $serviceCategory = ServiceCategory::find($service->service_categories_id);
        $service->status = 1;
        $serviceCategory->status = 1;
        $serviceCategory->save();
        $service->save();
        $service->restore();

        return redirect()->route('admin.services.index')->with('message', 'Restore successfully');
    }
}
