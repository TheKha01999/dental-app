<?php

namespace App\Http\Controllers\Client\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientDoctorController extends Controller
{
    public function showAllDoctor()
    {
        //Navbar
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        ///////////////////////

        $doctors = DB::table('doctors')
            ->select('doctors.*', 'service_categories.name as specialist')
            ->where('doctors.status', '1')
            ->where('service_categories.status', '1')
            ->join('service_categories', 'service_categories.id', '=', 'doctors.service_categories_id')
            ->get();

        return view(
            'client.pages.Doctors.list',
            [
                'blogCategories' => $blogCategories,
                'serviceCategories' => $serviceCategories,
                'doctors' => $doctors
            ]
        );
    }
    public function showSingleDoctor($id)
    {
        //Navbar
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        ///////////////////////

        $doctor = DB::table('doctors')
            ->select('doctors.*', 'service_categories.name as specialist')
            ->where('doctors.status', '1')
            ->where('doctors.id', $id)
            ->where('service_categories.status', '1')
            ->join('service_categories', 'service_categories.id', '=', 'doctors.service_categories_id')
            ->get()
            ->first();

        return view(
            'client.pages.Doctors.singleDoctor',
            [
                'blogCategories' => $blogCategories,
                'serviceCategories' => $serviceCategories,
                'doctor' => $doctor
            ]
        );
    }
}
