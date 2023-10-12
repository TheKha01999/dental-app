@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout5 text-center">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading">Check Out</h1>
                    <nav>
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.html">Shopping-cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check out</li>
                        </ol>
                    </nav>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                    </h4>
                    <ul class="list-group mb-3">

                        @php $total = 0 @endphp
                        @foreach ($cart as $item)
                            @php $total += $item['price'] * $item['qty'] @endphp
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div style="width: 70%">
                                    <h6 class="my-0">{{ $item['name'] }}</h6>
                                </div>
                                <span class="text-muted">
                                    {{ number_format($item['price'] * $item['qty'], 0, '.', ',') }} VND
                                </span>
                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>{{ number_format($total, 0, '.', ',') }} VND</strong>
                        </li>
                    </ul>

                    {{-- <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form> --}}
                </div>

                <!-- Left -->
                <div class="col-md-8 order-md-1">
                    @if (session('message'))
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert" style="cursor: pointer">×</a>
                            {{ session('message') }}
                        </div>
                    @endif
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate="" method="post" action="{{ route('home.place-order') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name">User name</label>
                                <input disabled type="text" class="form-control" id="firstName"
                                    value="{{ Auth::user()->name }}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email </label>
                            <input type="text" class="form-control" id="email" placeholder="you@example.com"
                                name="email" disabled value="{{ Auth::user()->email }}">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input name="address" type="text" class="form-control" id="address"
                                placeholder="Street Address" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address2">Phone Number</label>
                            <input name="phone" type="text" class="form-control" id="phone"
                                value="{{ Auth::user()->phone }}" placeholder="Ex: 84777171086">
                            @error('phone')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="note">Notes</label>
                            <textarea name="note" class="form-control" id="note" rows="3"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="cod" value="cod"
                                    name="payment_method" checked>
                                <label class="form-check-label" for="cod">
                                    COD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="vnpay" value="vnpay"
                                    name="payment_method">
                                <label class="form-check-label" for="vnpay">
                                    VN Pay
                                </label>
                            </div>
                            @error('payment_method')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="cod" value="cod"
                                    name="payment_method">
                                <label class="custom-control-label" for="cod">COD</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="vnpay" value="vnpay"
                                    name="payment_method">
                                <label class="custom-control-label" for="vnpay">VN Pay</label>
                            </div> --}}
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder=""
                                    required="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div> --}}

                        <hr class="mb-4">
                        <button style="background-color: #21CDC0" class="btn btn-primary btn-lg btn-block"
                            type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
