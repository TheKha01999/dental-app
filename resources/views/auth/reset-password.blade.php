@extends('client.layout.master')

@section('content')
    <section style="background-color: #283B6A;">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-sm-4">
                    <div class="card py-3 px-4" style="border-radius: 1rem;">

                        <div class="d-flex align-items-center  mb-3 pb-1">
                            <img src="{{ asset('assets/client/images/logo/logo-dark.png') }}" alt="logo form login">
                        </div>
                        {{-- <p class="heading__desc mb-20 text-success">{{ session('status') }}</p> --}}
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" id="email" class="form-control form-control-lg" name="email"
                                    autofocus="autofocus" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                                @php
                                    $messages = $errors->get('password');
                                @endphp
                                @if ($messages)
                                    @foreach ((array) $messages as $message)
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password_confirmation">Confirm password</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="password_confirmation">
                                @php
                                    $messages = $errors->get('password_confirmation');
                                @endphp
                                @if ($messages)
                                    @foreach ((array) $messages as $message)
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn__secondary btn-lg btn-block" type="submit">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
