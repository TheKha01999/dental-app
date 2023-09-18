<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientHomeController extends Controller
{
    public function index()
    {
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get('name');

        return view('client.pages.Home.home', ['blogCategories' => $blogCategories]);
    }
}
