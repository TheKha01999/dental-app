{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout5">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between flex-wrap align-items-center">
                    <h1 class="pagetitle__heading my-3">{{ Auth::user()->name }}</h1>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->
    <section>
        <div class="container">
            <h1 class="">Your Info</h1>
            <div class="appointment">

                @foreach ($bookings as $booking)
                    <div class="row border px-2 py-2 mb-3">
                        <div class="col-md-4">
                            <h6>{{ Auth::user()->name }}</h6>
                            <h6>{{ Auth::user()->email }}</h6>
                            <h6>Patient</h6>

                        </div>
                        <div class="col-md-8 border">
                            <div class="row">
                                <div class="col-md-2">Chi nhánh</div>
                                <div class="col-md-10">{{ $booking->branch_name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Dịch vụ</div>
                                <div class="col-md-10">{{ $booking->service_name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Bác sĩ</div>
                                <div class="col-md-10">{{ $booking->doctor_name }}</div>
                            </div>
                            @php
                                $Newdate = date('d-m-Y', strtotime($booking->date));
                            @endphp
                            <div class="row">
                                <div class="col-md-2">Ngày</div>
                                <div class="col-md-10">{{ $Newdate }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Vào lúc </div>
                                <div class="col-md-10">{{ $booking->time }}</div>
                            </div>
                            @php
                                if ($booking->status_code == 'S1') {
                                    $color = 'gray';
                                } elseif ($booking->status_code == 'S2') {
                                    $color = 'green';
                                } elseif ($booking->status_code == 'S3') {
                                    $color = 'red';
                                } else {
                                    $color = '#d35400';
                                }
                            @endphp
                            <div class="row">
                                <div class="col-md-2">Trạng thái </div>
                                <div class="col-md-10" style="color:{{ $color }}">
                                    <h5 style="color: {{ $color }}"> {{ $booking->status }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="row border px-2 py-2">
                    <div class="col-md-4 border">
                        <h6>{{ Auth::user()->name }}</h6>
                        <h6>{{ Auth::user()->email }}</h6>
                        <h6>Patient</h6>

                    </div>
                    <div class="col-md-8 border">
                        <div class="row">
                            <div class="col-md-3">Bác sĩ</div>
                            <div class="col-md-3">Thế Kha</div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
@endsection

@section('title')
    Dashboard
@endsection
{{-- 
@section('profile')
  
@endsection --}}
