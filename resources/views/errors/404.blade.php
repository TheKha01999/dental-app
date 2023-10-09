{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

@extends('client.layout.master')
@section('content')
    <div style=" width:100%;background-image: url('https://i.postimg.cc/ZnHTP71s/aircraft-airplane-boat-1575833.jpg');background-size: cover;"
        class="d-flex align-items-center justify-content-center vh-100">
        <h1 class="display-1 fw-bold text-white">404</h1>
    </div>
@endsection
