<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{


    public function index()
    {
        //Navbar
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        /////
        return view('client.pages.Appointment.appointment', [
            'blogCategories' => $blogCategories,
            'serviceCategories' => $serviceCategories
        ]);
    }
}
