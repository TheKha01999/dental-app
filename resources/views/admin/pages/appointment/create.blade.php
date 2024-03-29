@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Appointment</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('admin.bookings.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Users</label>
                                        <select class="custom-select" name="user">
                                            <option value="">---Select user---</option>
                                            @foreach ($users as $user)
                                                <option {{ old('user') == $user->id ? 'selected' : '' }}
                                                    value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Branch</label>
                                        <select id="branch" class="custom-select" name="branch">
                                            <option value="">---Select branch---</option>
                                            @foreach ($branchs as $branch)
                                                <option value="{{ $branch->id }}">
                                                    {{ $branch->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('branch')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Services</label>
                                        <select class="custom-select" name="service" id="service">
                                            <option value="">---Select user---</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">
                                                    {{ $service->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Doctors</label>
                                        <select id="doctor" class="custom-select" name="doctor">
                                            <option value="">---Select doctors---</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">
                                                    {{ $doctor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('doctor')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <input name="day" type="text" value="{{ old('day') }}"
                                            class="form-control" id="datepicker" placeholder="day-month-year (01-09-1999)">

                                        @error('day')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Times</label>
                                        <select class="custom-select" name="time">
                                            <option value="">---Select times---</option>
                                            @foreach ($timesCode as $timeCode)
                                                <option {{ old('time') === $timeCode->code ? 'selected' : '' }}
                                                    value="{{ $timeCode->code }}">
                                                    {{ $timeCode->time }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('time')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="custom-select" name="status">
                                            <option value="">---Select status---</option>
                                            @foreach ($statusCode as $status)
                                                <option {{ old('status') === $status->code ? 'selected' : '' }}
                                                    value="{{ $status->code }}">
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('booking_create_menu_open')
    menu-open
@endsection
@section('booking_create_menu_active')
    active
@endsection


@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#branch').on('change', function() {
                let branch_id = $('#branch').val();
                let service_id = $('#service').val();
                console.log(branch_id, service_id);
                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('admin.bookings.show-doctor-ajax') }}", //action of form
                    data: {
                        'branch_id': branch_id,
                        'service_id': service_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let doctors = response.doctors;
                        $('#doctor').children().remove();
                        $('#doctor').append("<option value=''>---Select doctors---</option>");
                        $.each(doctors, function(key, doctor) {
                            // console.log(doctor);
                            $('#doctor').append(
                                `<option value='${doctor.id}'>${doctor.name}</option>`
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
                    url: "{{ route('admin.bookings.show-doctor-ajax') }}", //action of form
                    data: {
                        'service_id': service_id,
                        'branch_id': branch_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let doctors = response.doctors;
                        $('#doctor').children().remove();
                        $('#doctor').append("<option value=''>---Select doctors---</option>");
                        $.each(doctors, function(key, doctor) {
                            // console.log(doctor);
                            $('#doctor').append(
                                `<option value='${doctor.id}'>${doctor.name}</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>

    <script>
        // var dateToday = new Date();
        $(function() {
            $("#datepicker").datepicker({
                minDate: 1,
                dateFormat: 'dd-mm-yy'
            });
        });
    </script>
@endsection

@section('title')
    Admin | Create Booking
@endsection
