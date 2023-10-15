<?php

namespace App\Http\Controllers\Client\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientDoctorController extends Controller
{
    public function showAllDoctor()
    {

        $doctors = DB::table('doctors')
            ->select('doctors.*', 'service_categories.name as specialist')
            ->where('doctors.status', '1')
            ->where('service_categories.status', '1')
            ->join('service_categories', 'service_categories.id', '=', 'doctors.service_categories_id')
            ->get();

        return view(
            'client.pages.Doctors.list',
            [
                'doctors' => $doctors
            ]
        );
    }
    public function showSingleDoctor($id)
    {


        $doctor = DB::table('doctors')
            ->select('doctors.*', 'service_categories.name as specialist')
            ->where('doctors.status', '1')
            ->where('doctors.id', $id)
            ->where('service_categories.status', '1')
            ->join('service_categories', 'service_categories.id', '=', 'doctors.service_categories_id')
            ->get()
            ->first();
        if (!$doctor) abort(404);

        return view(
            'client.pages.Doctors.singleDoctor',
            [
                'doctor' => $doctor
            ]
        );
    }
}
