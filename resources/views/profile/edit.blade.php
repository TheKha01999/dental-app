{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
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
                    <h1 class="pagetitle__heading my-3">Your Profile</h1>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- Update or Edit Profile -->
    <section>
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3 mb-4">

                    <div class="text-center">
                        @php
                            $imagesLink = is_null($user->image) || !file_exists('images/' . $user->image) ? 'https://bootdey.com/img/Content/avatar/avatar7.png' : asset('images/' . $user->image);
                        @endphp
                        <img src="{{ $imagesLink }}" alt="{{ $user->name }}" class="avatar img-circle img-thumbnail">
                        <h6>Upload a different photo...</h6>
                        <form action="{{ route('profile.updateAvatar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="image" type="file" class="mb-4">
                            @error('image')
                                <div class="text-danger mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button type="submit " class="btn btn__secondary btn__rounded">
                                Update avatar
                            </button>
                        </form>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    @if (session('status') === 'profile-updated' ||
                            session('status') === 'password-updated' ||
                            session('status') === 'avatar-updated')
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            Your updated saved !
                        </div>
                    @endif

                    <div class="edit-profile">
                        <h3 class="heading__title mb-40"> Profile Information</h3>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="edit-profile">
                        <h3 class="heading__title mb-40"> Update Password</h3>
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="edit-profile">
                        <h3 class="heading__title mb-40"> Delete Account</h3>
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>
        </div>

        {{-- <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-lg font-medium text-gray-900">
                        Profile Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Update your account's profile information and email address.
                    </p>
                </div>
            </div>

            <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="col p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="row mt-90">
                <div class="col">
                    <h2 class="text-lg font-medium text-gray-900">
                        Update Password
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Ensure your account is using a long, random password to stay secure.
                    </p>
                </div>
            </div>

            <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="col p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="row mt-90">
                <div class="col">
                    <h2 class="text-lg font-medium text-gray-900">
                        Delete Account
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before
                        deleting your account, please download any data or information that you wish to retain.
                    </p>
                </div>
            </div>

            <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="col p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div> --}}
    </section>
@endsection


{{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}
@section('title')
    Profile
@endsection
