<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Doctor\CreateDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorRequest;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
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
            $filter[] = ['doctors.status', $status];
        }

        //Query Builder
        $doctors = DB::table('doctors')
            ->select('doctors.*', 'service_categories.name as service_category_name', 'branchs.name as branch_name')
            ->where($filter)
            ->join('service_categories', 'doctors.service_categories_id', '=', 'service_categories.id')
            ->join('branchs', 'doctors.branch_id', '=', 'branchs.id')
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);

        $doctors->appends(['sortBy' => $request->sortBy, 'status' => $request->status, 'keyword' => $request->keyword]);
        if ($request->page > $doctors->lastPage()) abort(404);

        return view(
            'admin.pages.doctors.list',
            [
                'doctors' => $doctors,
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
        $branchs = DB::table('branchs')->where('status', '=', '1')->get();

        return view('admin.pages.doctors.create', ['serviceCategories' => $serviceCategories, 'branchs' => $branchs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDoctorRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }


        $check = DB::table('doctors')->insert([
            "name" => $request->name,
            "description" => $request->description,
            "biography" => $request->biography,
            "status" => $request->status,
            "service_categories_id" => $request->service_categories_id,
            "branch_id" => $request->branch_id,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Created failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.doctors.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        // $doctor = DB::table('doctors')->find($id);
        $serviceCategories = DB::table('service_categories')->where('status', '=', 1)->get();
        $branchs = DB::table('branchs')->where('status', '=', 1)->get();

        return view(
            'admin.pages.doctors.detail',
            [
                'doctor' => $doctor,
                'serviceCategories' => $serviceCategories,
                'branchs' => $branchs
            ]
        );
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
    public function update(UpdateDoctorRequest $request, string $id)
    {
        //Destroy image of dont use again old image in source file
        $doctor = DB::table('doctors')->find($id);
        $oldImage = $doctor->image;


        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
                unlink('images/' . $oldImage);
            }
        }

        $check = DB::table('doctors')->where('id', '=', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "biography" => $request->biography,
            "status" => $request->status,
            "service_categories_id" => $request->service_categories_id,
            "branch_id" => $request->branch_id,
            "image" => $fileName ?? $oldImage,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.doctors.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $doctor = Doctor::find((int)$id);
        $doctor->status = 0;
        $doctor->save();

        $doctor->delete();

        //session flash
        return redirect()->route('admin.doctors.index')->with('message', 'Deleted successfully');
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
        $doctor = Doctor::withTrashed()->find($id);
        $doctor->status = 1;
        $doctor->save();
        $doctor->restore();

        return redirect()->route('admin.doctors.index')->with('message', 'Restore successfully');
    }
}
