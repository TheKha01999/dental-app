<?php

namespace App\Http\Controllers\Client\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientFaqsController extends Controller
{
    public function index()
    {
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        return view('client.pages.Faqs.faqs', ['blogCategories' => $blogCategories]);
    }
}