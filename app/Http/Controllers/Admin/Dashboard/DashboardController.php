<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $arrayDatas = [];
        $arrayDatas[] =  ['Order Status', 'Number'];
        $dataOrders = DB::table('orders')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();

        foreach ($dataOrders as $data) {
            $arrayDatas[] = [$data->status, $data->number];
        }
        // dd($arrayDatas);

        //////////////////////////////////////////
        $totalRegister = DB::table('users')
            ->where('role', '0')
            ->selectRaw('count(role) as totalRegister')
            ->groupBy('role')
            ->get()
            ->first();


        $totalOrder = DB::table('orders')
            ->selectRaw('count(id) as totalOrder')
            ->get()
            ->first();

        $totalAppointment = DB::table('bookings')
            ->selectRaw('count(id) as totalAppointment')
            ->get()
            ->first();

        $totalDoctors = DB::table('doctors')
            ->selectRaw('count(id) as totalDoctors')
            ->get()
            ->first();

        //////////////////////////////////////////////////
        $productDatas = DB::table('products')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.name, SUM(order_items.qty) as total')
            ->groupBy('products.id')
            ->orderBy('total', 'desc')
            ->get();

        $qty_per_product = [];
        $qty_per_product[] =  ['Product', 'Number'];
        foreach ($productDatas as $productData) {
            if ($productData->total === null) {
                $productData->total = 0;
            }
            $qty_per_product[] = [$productData->name, (int)$productData->total];
        }

        //////////////////////////////////////
        $arrayBookings = [];
        $arrayBookings[] =  ['Booking Status', 'Number'];
        $bookings = DB::table('bookings')
            ->selectRaw('status_code, count(status_code) as number')
            ->groupBy('status_code')
            ->get();

        foreach ($bookings as $booking) {
            if ($booking->status_code === 'S1') {
                $booking->status_code = 'Wait';
            } else if ($booking->status_code === 'S2') {
                $booking->status_code = 'Approved';
            } else if ($booking->status_code === 'S3') {
                $booking->status_code = 'Cancelled';
            } else {
                $booking->status_code = 'Finished';
            }
            $arrayBookings[] = [$booking->status_code, $booking->number];
        }

        ////////////////////////////////////////////////////////////
        $doctors = DB::table('doctors')
            ->leftJoin('bookings', 'doctors.id', '=', 'bookings.doctor_id')
            ->selectRaw('doctors.name, COUNT(bookings.doctor_id) as total')
            ->groupBy('bookings.doctor_id')
            ->orderBy('total', 'desc')
            ->get();

        $booking_per_doctor = [];
        $booking_per_doctor[] =  ['Doctor', 'Total'];
        foreach ($doctors as $doctor) {
            if ($doctor->total === null) {
                $doctor->total = 0;
            }
            $booking_per_doctor[] = [$doctor->name, (int)$doctor->total];
        }
        // dd($booking_per_doctor);
        return view(
            'admin.pages.dashboard.dashboard',
            [
                'arrayDatas' => $arrayDatas,
                'totalRegister' => $totalRegister,
                'totalOrder' => $totalOrder,
                'totalAppointment' => $totalAppointment,
                'totalDoctors' => $totalDoctors,
                'qty_per_product' => $qty_per_product,
                'arrayBookings' => $arrayBookings,
                'booking_per_doctor' => $booking_per_doctor,
            ]
        );
    }
}
