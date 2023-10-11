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
            <h3 class="heading__title mb-40">Appointment</h3>

            <div class="row row-custom">
                <div class="col-sm-12">
                    @foreach ($bookings as $booking)
                        @php
                            $Newdate = date('d-m-Y', strtotime($booking->date));
                            
                        @endphp
                        <div class="card margin-bottom">
                            <div class="card-header">
                                <p class="text-block__desc">
                                    Appointment date: {{ $Newdate }} - Time: {{ $booking->time }}
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="grid-2-colum">
                                    <div class="box-cover border-sp">
                                        <h5>Customer Infomation</h5>
                                        <div class="grid-appointment">
                                            <p class="text-block__desc">Name:</p>
                                            <p class="text-block__desc">{{ Auth::user()->name }}</p>
                                            <p class="text-block__desc">Email:</p>
                                            <p class="text-block__desc">{{ Auth::user()->email }}</p>
                                            <p class="text-block__desc">Phone:</p>
                                            <p class="text-block__desc">{{ Auth::user()->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="box-cover">
                                        <h5>Treatment Infomation</h5>
                                        <div class="grid-appointment">
                                            <p class="text-block__desc">Branch:</p>
                                            <p class="text-block__desc">{{ $booking->branch_name }}</p>
                                            <p class="text-block__desc">Doctor:</p>
                                            <p class="text-block__desc">{{ $booking->doctor_name }}</p>
                                            <p class="text-block__desc">Service:</p>
                                            <p class="text-block__desc">{{ $booking->service_name }}</p>
                                            @php
                                                if ($booking->status_code == 'S1') {
                                                    $color = '#e1b12c';
                                                } elseif ($booking->status_code == 'S2') {
                                                    $color = 'green';
                                                } elseif ($booking->status_code == 'S3') {
                                                    $color = 'red';
                                                } else {
                                                    $color = '#b33939';
                                                }
                                            @endphp
                                            <p class="text-block__desc">Status:</p>
                                            <p style="color:{{ $color }}" class="text-block__desc status">
                                                {{ $booking->status }}</p>
                                        </div>
                                        <div class="text-right mt-3">
                                            <a href="#" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
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
