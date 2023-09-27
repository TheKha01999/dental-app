<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientHomeController extends Controller
{
    public function index()
    {
        //Navbar
        // $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        // $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        /////
        return view('client.pages.Home.home');
        // return view(
        //     'client.pages.Home.home',
        //     [
        //         'blogCategories' => $blogCategories,
        //         'serviceCategories' => $serviceCategories
        //     ]
        // );
        // return view('client.pages.Home.home');
    }
}
