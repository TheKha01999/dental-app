<?php

namespace App\Http\Controllers\Admin\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Branch\CreateBranchRequest;
use App\Http\Requests\Admin\Branch\UpdateBranchRequest;
use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        //Query Builder
        $branchs = DB::table('branchs')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.pages.branchs.list', ['branchs' => $branchs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.branchs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBranchRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $check = DB::table('branchs')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "image" => $fileName ?? null,
            "status" => $request->status,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created successfully' : 'Created failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.branchs.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);
        // $branch = DB::table('branchs')->find($id);

        return view('admin.pages.branchs.detail', ['branch' => $branch]);
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
    public function update(UpdateBranchRequest $request, string $id)
    {
        $branch = DB::table('branchs')->find($id);
        $oldImageFileName = $branch->image;

        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }
        $check = DB::table('branchs')->where('id', '=', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "image" => $fileName ?? $oldImageFileName,
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.branchs.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find((int)$id);
        $branch->status = 0;
        $branch->save();

        $branch->delete();
        //session flash
        return redirect()->route('admin.branchs.index')->with('message', 'Deleted successfully');
    }
    public function restore(string $id)
    {
        $branch = Branch::withTrashed()->find($id);
        $branch->status = 1;
        $branch->save();
        $branch->restore();

        return redirect()->route('admin.branchs.index')->with('message', 'Restore successfully');
    }
}
