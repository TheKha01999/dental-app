<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Events\BookingSuccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appointment\BookingRequest;
use App\Http\Requests\Admin\Appointment\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = DB::table('bookings')
            ->select('bookings.*', 'branchs.name as branch_name', 'service_categories.name as service_name', 'doctors.name as doctor_name', 'booking_times.time as time', 'booking_status.status as status', 'users.name as name')
            ->join('branchs', 'branchs.id', '=', 'bookings.branch_id')
            ->join('service_categories', 'service_categories.id', '=', 'bookings.service_id')
            ->join('doctors', 'doctors.id', '=', 'bookings.doctor_id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('booking_times', 'booking_times.code', '=', 'bookings.time_code')
            ->join('booking_status', 'booking_status.code', '=', 'bookings.status_code')
            ->orderBy('bookings.created_at', 'desc')
            ->get();
        // dd($bookings);
        return view('admin.pages.appointment.list', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branchs = DB::table('branchs')->where('status', '=', '1')->get();
        $users = DB::table('users')->where('role', '=', '0')->get();
        $doctors = DB::table('doctors')->where('status', '=', '1')->get();
        $timesCode = DB::table('booking_times')->get();
        $statusCode = DB::table('booking_status')->get();
        $services = DB::table('service_categories')->where('status', '=', '1')->get();
        // dd([$branchs, $users, $doctors, $timesCode, $statusCode]);

        return view(
            'admin.pages.appointment.create',
            [
                'branchs' => $branchs,
                'users' => $users,
                'doctors' => $doctors,
                'timesCode' => $timesCode,
                'statusCode' => $statusCode,
                'services' => $services,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $originalDate = $request->day;
        $originalDate = Carbon::createFromFormat('d-m-Y', $originalDate)->format('Y-m-d');

        $user = User::find($request->user);


        $booking = Booking::create([
            "user_id" => $request->user,
            "branch_id" => $request->branch,
            "service_id" => $request->service,
            "doctor_id" => $request->doctor,
            "status_code" => $request->status,
            "time_code" => $request->time,
            'date' => $originalDate,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        // $check = DB::table('bookings')->insert([
        //     "user_id" => $request->user,
        //     "branch_id" => $request->branch,
        //     "service_id" => $request->service,
        //     "doctor_id" => $request->doctor,
        //     "status_code" => $request->status,
        //     "time_code" => $request->time,
        //     'date' => $originalDate,
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now()
        // ]);
        event(new BookingSuccess($user, $booking));
        // $message = $check ? 'Created successfully' : 'Created failed';
        // dd($message);
        //session flash
        return redirect()->route('admin.bookings.index')->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branchs = DB::table('branchs')->where('status', '=', '1')->get();
        $users = DB::table('users')->where('role', '=', '0')->get();
        $timesCode = DB::table('booking_times')->get();
        $statusCode = DB::table('booking_status')->get();

        $services = DB::table('service_categories')->where('status', '=', '1')->get();

        $booking = DB::table('bookings')->find($id);

        $doctorID = $booking->doctor_id;

        $doctors = DB::table('doctors')->where('status', '=', '1')->where('id', '=', $doctorID)->get();

        return view(
            'admin.pages.appointment.detail',
            [
                'branchs' => $branchs,
                'users' => $users,
                'doctors' => $doctors,
                'timesCode' => $timesCode,
                'statusCode' => $statusCode,
                'services' => $services,
                'booking' =>  $booking,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, string $id)
    {
        $originalDate = $request->day;
        $originalDate = Carbon::createFromFormat('d-m-Y', $originalDate)->format('Y-m-d');
        $check = DB::table('bookings')->where('id', '=', $id)->update([
            "user_id" => $request->user,
            "branch_id" => $request->branch,
            "service_id" => $request->service,
            "doctor_id" => $request->doctor,
            "status_code" => $request->status,
            "time_code" => $request->time,
            'date' => $originalDate,

            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.bookings.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find((int)$id);

        $booking->delete();

        //session flash
        return redirect()->route('admin.bookings.index')->with('message', 'Deleted successfully');
    }
    public function showDoctor(Request $request)
    {
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
    public function restore(string $id)
    {
        $booking = Booking::withTrashed()->find($id);

        $booking->restore();

        return redirect()->route('admin.bookings.index')->with('message', 'Restore successfully');
    }
}
