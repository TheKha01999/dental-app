{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html> --}}

{{-- @extends('client.layout.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="page-title page-title-layout5 text-center">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading"> {{ $header }}</h1>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->
    <div class="min-h-screen bg-gray-100">
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
@endsection

@section('userDash')
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
            this.closest('form').submit();">Log Out</a>
        </form>
    </div>
@endsection --}}
