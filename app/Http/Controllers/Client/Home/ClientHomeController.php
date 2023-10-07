<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientHomeController extends Controller
{
    public function index()
    {

        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        $doctors = DB::table('doctors')
            ->select('doctors.*', 'service_categories.name as specialist')
            ->where('doctors.status', '1')
            ->where('service_categories.status', '1')
            ->join('service_categories', 'service_categories.id', '=', 'doctors.service_categories_id')
            ->get();

        return view(
            'client.pages.Home.home',
            [
                'doctors' => $doctors,
                'serviceCategories' => $serviceCategories
            ]
        );
    }
}
