<?php

namespace App\Http\Controllers\Client\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientServicesController extends Controller
{
    public function showServicePost($id)
    {
        //Navbar
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();
        ///////////

        $service = DB::table('services')
            ->where('service_categories_id', $id)->get()->first();


        return view(
            'client.pages.OurServices.list',
            [
                'blogCategories' => $blogCategories,
                'serviceCategories' => $serviceCategories,
                'service' => $service
            ]
        );
    }
}
