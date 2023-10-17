@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout4 bg-overlay text-center">
        <div class="bg-img"><img src="{{ asset('assets/client/images/page-titles/5.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
                    <h1 class="pagetitle__heading">Improve Quality Of Life Through Better Health.</h1>
                    <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative solutions,
                        specializing in medical services for treatment of medical infrastructure.
                    </p>
                    <a href="{{ route('home.allDoctors') }}" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Find A Doctor</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    {{-- <label id="contact-name-error" class="error" for="contact-name">This field is required.</label> --}}

    <section class="contact-layout2 pt-60 bg-overlay bg-overlay-blue-gradient pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-panel d-flex flex-wrap">
                        <form role="form" class="contact-panel__form" method="post"
                            action="{{ route('home.appointment.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact-panel__title">Book An Appointment</h4>
                                    <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly
                                        reception staff
                                        with any general or medical enquiry. Our doctors will receive or return any urgent
                                        calls.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-widget form-group-icon"></i>
                                        <select id="branch" name="branch" class="form-control">
                                            <option value="">Choose Clinic</option>
                                            @foreach ($branchs as $branch)
                                                <option value="{{ $branch->id }}">
                                                    {{ $branch->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('branch')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="form-group-icon fas fa-file-medical"></i>
                                        <select class="form-control margin-bottom" name="service" id="service">
                                            <option value="">Choose Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">
                                                    {{ $service->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->


                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" value="{{ Auth::user()->name }}" class="form-control"
                                            id="user" name="user" disabled>
                                        @error('user')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->


                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-user form-group-icon"></i>
                                        <select class="form-control" id="doctor" name="doctor">
                                            <option value="">Choose Doctor</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">
                                                    {{ $doctor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('doctor')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <i class="icon-phone form-group-icon"></i>
                                        <input type="text" value="{{ Auth::user()->phone }}" class="form-control"
                                            placeholder="Phone" id="phone" name="phone">
                                        @error('phone')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input class="form-control" name="day" type="text"
                                            value="{{ old('day') }}" class="form-control" id="datepicker"
                                            placeholder="d-m-Y">
                                        @error('day')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <i class="far fa-clock form-group-icon"></i>
                                        <select class="form-control" name="time">
                                            <option value="">Choose Times</option>
                                            @foreach ($timesCode as $timeCode)
                                                <option {{ old('time') === $timeCode->code ? 'selected' : '' }}
                                                    value="{{ $timeCode->code }}">
                                                    {{ $timeCode->time }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('time')
                                            <label id="contact-name-error" class="error"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Book Appointment</span> <i class="icon-arrow-right"></i>
                                    </button>
                                    <div class="contact-result"></div>
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                        <div
                            class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                            <div class="bg-img"><img src="{{ asset('assets/client/images/banners/1.jpg') }}"
                                    alt="banner">
                            </div>
                            <div>
                                <h4 class="contact-panel__title color-white">Quick Contacts</h4>
                                <p class="contact-panel__desc font-weight-bold color-white mb-30">Please feel free to
                                    contact our
                                    friendly staff with any medical enquiry.
                                </p>
                            </div>
                            <div>
                                <ul class="contact__list list-unstyled mb-30">
                                    <li>
                                        <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002)
                                            01061245741</a>
                                    </li>
                                    <li>
                                        <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i><a href="#">Mon - Fri: 8:00 am - 7:00
                                            pm</a>
                                    </li>
                                </ul>
                                <a href="#footer" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact layout 2 -->
@endsection

@section('title')
    Appointment
@endsection

@section('js-custom')
    <script>
        // var dateToday = new Date();
        $(function() {
            $("#datepicker").datepicker({
                minDate: 1,
                dateFormat: 'dd-mm-yy'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#branch').on('change', function() {
                let branch_id = $('#branch').val();
                let service_id = $('#service').val();
                console.log(branch_id, service_id);
                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('home.appointment.show-doctor-ajax') }}", //action of form
                    data: {
                        'branch_id': branch_id,
                        'service_id': service_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let doctors = response.doctors;
                        console.log(doctors);
                        $('body > section.contact-layout2.pt-60.bg-overlay.bg-overlay-blue-gradient.pb-60 > div > div > div > div > form > div > div:nth-child(5) > div > div > ul')
                            .children().remove();

                        $('body > section.contact-layout2.pt-60.bg-overlay.bg-overlay-blue-gradient.pb-60 > div > div > div > div > form > div > div:nth-child(5) > div > div > ul')
                            .append(
                                "<li data-value='' class='option focus selected'>Choose Doctor</li>"
                            );
                        $.each(doctors, function(key, doctor) {
                            $('body > section.contact-layout2.pt-60.bg-overlay.bg-overlay-blue-gradient.pb-60 > div > div > div > div > form > div > div:nth-child(5) > div > div > ul')
                                .append(
                                    `<li data-value="${doctor.id}" class="option">${doctor.name}</li>`
                                );
                        });
                    }
                });
            });

            $('#service').on('change', function() {
                let service_id = $('#service').val();
                let branch_id = $('#branch').val();
                console.log(branch_id, service_id);
                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('home.appointment.show-doctor-ajax') }}", //action of form
                    data: {
                        'service_id': service_id,
                        'branch_id': branch_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let doctors = response.doctors;
                        console.log(doctors);
                        $('body > section.contact-layout2.pt-60.bg-overlay.bg-overlay-blue-gradient.pb-60 > div > div > div > div > form > div > div:nth-child(5) > div > div > ul')
                            .children().remove();

                        $('body > section.contact-layout2.pt-60.bg-overlay.bg-overlay-blue-gradient.pb-60 > div > div > div > div > form > div > div:nth-child(5) > div > div > ul')
                            .append(
                                "<li data-value='' class='option focus selected'>Choose Doctor</li>"
                            );
                        $.each(doctors, function(key, doctor) {
                            $('body > section.contact-layout2.pt-60.bg-overlay.bg-overlay-blue-gradient.pb-60 > div > div > div > div > form > div > div:nth-child(5) > div > div > ul')
                                .append(
                                    `<li data-value="${doctor.id}" class="option">${doctor.name}</li>`
                                );
                        });
                    }
                });
            });
        });
    </script>
@endsection
