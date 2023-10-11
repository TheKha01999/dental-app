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
                        <p class="heading__desc mb-20">
                            Thanks for signing up! Before getting started, could you verify your email address by clicking
                            on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you
                            another.
                        </p>
                        @if (session('status') == 'verification-link-sent')
                            <p class="heading__desc mb-20 text-success">
                                A new verification link has been sent to the email address you provided during registration.
                            </p>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="pt-1 mb-4">
                                <button class="btn btn__secondary btn-lg btn-block" type="submit">
                                    Resend Verification Email
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn__secondary btn-lg btn-block" type="submit">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
