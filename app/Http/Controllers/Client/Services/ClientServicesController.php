<?php

namespace App\Http\Controllers\Client\Services;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientServicesController extends Controller
{
    public function showServicePost($id)
    {
        $serviceCategories = DB::table('service_categories')->where('status', '=', '1')->get();

        $service = DB::table('services')
            ->where('service_categories_id', $id)->get()->first();
        if (!$service) abort(404);

        return view(
            'client.pages.OurServices.list',
            [
                'serviceCategories' => $serviceCategories,
                'service' => $service
            ]
        );
    }
}
