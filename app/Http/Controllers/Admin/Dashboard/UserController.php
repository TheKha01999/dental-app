<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateUserNameEmailRequest;
use App\Http\Requests\Admin\User\UpdateUserPasswordRequest;
use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->where('role', '0')->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $password =  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $email_verified_at = Carbon::now();
        $check = DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "image" => $fileName ?? null,
            "phone" => $request->phone,
            'email_verified_at' => $email_verified_at,
            'password' => $password,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created user successfully' : 'Created user failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')->find($id);

        return view('admin.pages.users.detail', ['user' => $user]);
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
    public function update(UpdateUserNameEmailRequest $request, string $id)
    {
        // $password =  Hash::make($request->password);

        $user = DB::table('users')->find($id);
        $oldImageFileName = $user->image;

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
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find((int)$id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'Deleted successfully');
    }
    public function updatePassword(UpdateUserPasswordRequest $request, string $id)
    {
        $password =  Hash::make($request->password);

        $check = DB::table('users')->where('id', '=', $id)->update([
            'password' => $password,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated password successfully' : 'Updated password failed';
        //session flash
        return redirect()->route('admin.users.index')->with('message', $message);
    }
}
