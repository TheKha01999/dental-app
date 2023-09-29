<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Medcity - Medical Healthcare HTML5 Template" />
    <link href="{{ asset('assets/client/images/favicon/favicon.png') }}" rel="icon" />
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/libraries.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/general.css') }}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
    @include('client.pages.header')
    <!-- /.Header and preloader -->

    @yield('content')

    <!-- ========================Footer========================== -->
    @include('client.pages.footer')
    <!-- /.Footer -->

    @include('client.pages.search-popup')
    <!-- /. search-popup -->

    @include('client.pages.scrollToTop')
    <!-- /.wrapper -->

    <script src="{{ asset('assets/client/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @yield('js-custom')
</body>

</html>
