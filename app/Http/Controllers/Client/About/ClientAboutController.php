<?php

namespace App\Http\Controllers\Client\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientAboutController extends Controller
{
    public function index()
    {
        return view('client.pages.About.about');
    }
}
