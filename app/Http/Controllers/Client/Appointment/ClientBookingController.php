<?php

namespace App\Http\Controllers\Client\Appointment;

use App\Events\BookingSuccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Appointment\ClientCreateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientBookingController extends Controller
{
    public function index()
    {
        $branchs = DB::table('branchs')->where('status', '=', '1')->get();
        $doctors = DB::table('doctors')->where('status', '=', '1')->get();
        $timesCode = DB::table('booking_times')->get();
        $statusCode = DB::table('booking_status')->get();
        $services = DB::table('service_categories')->where('status', '=', '1')->get();
        return view(
            'client.pages.Appointment.appointment',
            [
                'branchs' => $branchs,
                'doctors' => $doctors,
                'timesCode' => $timesCode,
                'statusCode' => $statusCode,
                'services' => $services,
            ]
        );
    }
    public function store(ClientCreateBookingRequest $request)
    {
        $originalDate = $request->day;
        $originalDate = Carbon::createFromFormat('d-m-Y', $originalDate)->format('Y-m-d');
        $status = 'S1';

        $user = User::find(Auth::user()->id);
        $user->phone = $request->phone;
        $user->save();

        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            "branch_id" => $request->branch,
            "service_id" => $request->service,
            "doctor_id" => $request->doctor,
            "status_code" => $status,
            "time_code" => $request->time,
            'date' => $originalDate,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);


        event(new BookingSuccess($user, $booking));

        return redirect()->route('dashboard')->with('message', 'Created appointment successfully');
    }
    public function showDoctor(Request $request)
    {
        // dd($request->all());
        $branch_id = $request->branch_id ?? null;
        $service_id = $request->service_id ?? null;

        // dd($branch_id, $service_id);

        if (!is_null($branch_id) && is_null($service_id)) {
            $doctors = DB::table('doctors')
                ->where('status', '=', '1')
                ->where('branch_id', '=', $branch_id)
                ->get();
            return response()->json(['doctors' => $doctors]);
        }

        if (is_null($branch_id) && !is_null($service_id)) {
            $doctors = DB::table('doctors')
                ->where('status', '=', '1')
                ->where('service_categories_id', '=',  $service_id)
                ->get();
            return response()->json(['doctors' => $doctors]);
        }

        if (!is_null($branch_id) && !is_null($service_id)) {
            $doctors = DB::table('doctors')
                ->where('status', '=', '1')
                ->where('branch_id', '=', $branch_id)
                ->where('service_categories_id', '=', $service_id)
                ->get();
            return response()->json(['doctors' => $doctors]);
        }

        $doctors = DB::table('doctors')
            ->where('status', '=', '1')
            ->get();
        // dd($doctors);
        return response()->json(['doctors' => $doctors]);
    }
    public function cancelBooking($id)
    {
        // dd($id);
        $check = DB::table('bookings')->where('id', '=', $id)->update([
            "status_code" => 'S3',
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Appointment Canceled' : 'Appointment Canceled Failed';
        //session flash
        return redirect()->route('dashboard')->with('message', $message);
    }
}
