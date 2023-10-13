<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\CreateAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminNameEmailRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminPasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = DB::table('users')->where('role', '1')->where('id', '<>', Auth::user()->id)->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.admins.list', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdminRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $password =  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $email_verified_at = Carbon::now();
        $role = 1;
        $check = DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            'email_verified_at' => $email_verified_at,
            'role' => $role,
            "image" => $fileName ?? null,
            "phone" => $request->phone,
            'password' => $password,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created admin successfully' : 'Created admin failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.admins.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = DB::table('users')->find($id);

        return view('admin.pages.admins.detail', ['admin' => $admin]);
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
    public function update(UpdateAdminNameEmailRequest $request, string $id)
    {
        $admin = DB::table('users')->find($id);
        $oldImageFileName = $admin->image;

        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }

        $check = DB::table('users')->where('id', '=', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "image" => $fileName ?? $oldImageFileName,
            // 'password' => $password,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.admins.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $admin = User::find((int)$id);

        $image = $admin->image;

        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        $admin->delete();

        //session flash
        return redirect()->route('admin.admins.index')->with('message', 'Deleted successfully');
    }
    public function updatePassword(UpdateAdminPasswordRequest $request, string $id)
    {
        $password =  Hash::make($request->password);

        $check = DB::table('users')->where('id', '=', $id)->update([
            'password' => $password,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated password successfully' : 'Updated password failed';
        //session flash
        return redirect()->route('admin.admins.index')->with('message', $message);
    }
}