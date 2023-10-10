<?php

namespace App\Http\Controllers\Client\Google;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user_check = DB::table('users')->where('email', '=', $googleUser->getEmail())->where('deleted_at', '<>', NULL)->get()->first();
        // dd(isset($user_check));
        if (isset($user_check)) {
            return redirect()->route('login')->with('message', 'Email has been already taken. Please use another email !');
        }
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
                'google_user_id' => $googleUser->getId(),
                'password' => Hash::make('password'),
            ]
        );

        Auth::login($user);
        return redirect()->route('home');
    }
}
