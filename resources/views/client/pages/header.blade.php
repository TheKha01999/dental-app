{{-- <div class="wrapper">
<div class="preloader">
    <div class="loading">
        <span></span><span></span><span></span><span></span>
    </div>
</div> --}}
<!-- /.preloader -->

<!-- =========================
    Header
=========================== -->
{{-- {{ dd($name) }} --}}
<header class="header header-layout2">
    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="topbar__text color-primary mb-0">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Our Clinic sees over 10,000 patients every year.
                            </span>
                            <a href="#" class="color-white">
                                <span>Hear their real stories</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </p>
                        <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                            <li>
                                <i class="icon-phone color-primary"></i>
                                <a href="tel:+5565454117">Emergency Line: (002) 01061245741</a>
                            </li>
                            <li>
                                <i class="icon-location color-primary"></i>
                                <a href="#">Location: Brooklyn, New York</a>
                            </li>
                            <li>
                                <i class="icon-clock color-primary"></i>
                                <a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                            </li>
                        </ul>
                        <!-- /.contact__list -->
                    </div>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/client/images/logo/logo-light.png') }}" class="logo-light" alt="logo" />
                <img src="{{ asset('assets/client/images/logo/logo-dark.png') }}" class="logo-dark" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav__item ">
                        <a href="{{ route('home') }}" class="nav__item-link ">Home</a>
                        {{-- Edit: xoa has-dropdown --}}
                        {{-- Da xoa dropdown menu --}}
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav__item has-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">About
                            Us</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('home.about') }}" class="nav__item-link">About Us</a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="{{ route('home.doctors') }}" class="nav__item-link">Doctors</a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="{{ route('home.faqs') }}" class="nav__item-link">Help & FAQs</a>
                            </li>
                            <!-- /.nav-item -->
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav__item has-dropdown">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle nav__item-link">Services
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="departments.html" class="nav__item-link">Orthodontic</a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="departments-single.html" class="nav__item-link">Implant</a></a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="departments-single.html" class="nav__item-link">Porcelain Crowns</a></a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="departments-single.html" class="nav__item-link">Ceramic Veneer</a></a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="departments-single.html" class="nav__item-link">Gummy Smile</a></a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="departments-single.html" class="nav__item-link">Wisdom teeth</a></a>
                            </li>
                            <!-- /.nav-item -->
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav__item ">
                        <a href="{{ route('home.blog') }}" class="nav__item-link">Blog</a>
                        {{-- xoa dropdown-toggle va xoa dropdown menu --}}
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav__item ">
                        <a href="{{ route('home.product') }}" class="nav__item-link">Shop</a>
                        {{-- xoa dropdown-toggle va xoa dropdown menu --}}
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="contact-us.html" class="nav__item-link">Contacts</a>
                    </li>
                    <!-- /.nav-item -->
                </ul>
                <!-- /.navbar-nav -->
                <button class="close-mobile-menu d-block d-lg-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.navbar-collapse -->
            <div class="d-none d-xl-flex align-items-center position-relative ml-30">
                <a href="appointment.html" class="btn btn__primary btn__rounded">
                    <i class="icon-calendar"></i>
                    <span>Appointment</span>
                </a>
            </div>
            <button class="action__btn-search ml-30">
                <i class="fa fa-search"></i>
            </button>
            <button class="ml-30 action__btn-cart">
                <i class="fa fa-shopping-cart"></i>
            </button>
            <div class="dropdown ml-30 action__btn-user">
                <button data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                </button>
                <div class="dropdown-menu">
                    @if (Route::has('login'))
                        <div>
                            @auth

                                {{-- <a class="dropdown-item" href="">Xin Chao {{ Session::get('name') }} !</a> --}}
                                <a class="dropdown-item" href="#">Xin Chao {{ Auth::user()->name }} !</a>
                                <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Edit Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navabr -->
</header>
<!-- /.Header -->
