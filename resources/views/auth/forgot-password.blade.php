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
                        <p class="heading__desc mb-20">Forgot your password? No problem. Just let us know your email address
                            and we
                            will email you a
                            password reset link that will allow you to choose a new one.</p>
                        <p class="heading__desc mb-20 text-success">{{ session('status') }}</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
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

                            <div class="pt-1 mb-4">
                                <button class="btn btn__secondary btn-lg btn-block" type="submit">
                                    Email Password Reset Link
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
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
     
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout> --}}
