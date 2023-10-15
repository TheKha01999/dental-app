@extends('client.layout.master')

@section('content')
    <section class="page-title page-title-layout5 text-center">
        <div class="bg-img"><img src="{{ asset('assets/client/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading">Our Products</h1>
                    <nav>
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">shop</li>
                        </ol>
                    </nav>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section class="shop-grid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
                        {{-- <span>Showing 1:9 of 45 product</span> --}}
                        <select>
                            <option selected="" value="0">Sort by latest</option>
                            <option value="1">Sort by Popular</option>
                            <option value="2">Sort by highest Price </option>
                            <option value="3">Sort by lowest Price </option>
                        </select>
                    </div>
                    <div class="row">
                        <!-- Product item #1 -->
                        @foreach ($products as $product)
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="product-item">
                                    <div class="product__img">
                                        <img src="{{ asset('images/' . $product->image) }}" alt="Product" loading="lazy">
                                        @php
                                            $cart = session()->get('cart', []);
                                            if (isset($cart[$product->id]['qty'])) {
                                                $qty_remain = $product->qty - $cart[$product->id]['qty'];
                                            } else {
                                                $qty_remain = $product->qty;
                                            }
                                        @endphp
                                        <div class="product__action">
                                            @if (!$qty_remain || !$product->qty)
                                                <a style="pointer-events:none;"
                                                    data-url="{{ route('home.product.add-to-cart', ['productId' => $product->id]) }}"
                                                    href="#" class="btn btn-danger btn__rounded add-to-cart">
                                                    <i class="icon-cart"></i> <span>Sold Out</span>
                                                </a>
                                            @else
                                                <a data-url="{{ route('home.product.add-to-cart', ['productId' => $product->id]) }}"
                                                    href="#" class="btn btn__primary btn__rounded add-to-cart">
                                                    <i class="icon-cart"></i> <span>Add To Cart</span>
                                                </a>
                                            @endif
                                        </div><!-- /.product-action -->
                                    </div><!-- /.product-img -->
                                    <div class="product__info">
                                        <h4 class="product__title"><a
                                                href="{{ route('home.product.single', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                        </h4>
                                        <span class="product__price">{{ number_format($product->price, 0, '.', ',') }}
                                            VND</span>
                                    </div><!-- /.product-content -->
                                </div><!-- /.product-item -->
                            </div><!-- /.col-lg-4 -->
                        @endforeach

                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                            <nav class="pagination-area">
                                <ul class="pagination justify-content-center">
                                    {{ $products->links('admin.pagination.pagination') }}
                                    {{-- <li><a class="current" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li> --}}
                                </ul>
                            </nav><!-- /.pagination-area -->
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div><!-- /.col-lg-9 -->
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <aside class="sidebar-layout2 sticky-top" style="top: 100px">
                        <div class="widget widget-search">
                            <h5 class="widget__title">Search</h5>
                            <div class="widget__content">
                                <form class="widget__form-search">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                                </form>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-search -->

                        <div class="widget widget-categories">
                            <h5 class="widget__title">Categories</h5>
                            <div class="widget-content">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($productCategories as $productCategory)
                                        <li><a href="{{ route('home.product.detail', ['id' => $productCategory->id]) }}"><span
                                                    class="cat-count">{{ $productCategory->totalProduct }}</span><span>{{ $productCategory->name }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-categories -->


                        <div class="widget widget-poducts">
                            <h5 class="widget__title">Best Sellers</h5>
                            <div class="widget__content">
                                <!-- product item #1 -->
                                @foreach ($topProducts as $topProduct)
                                    <div class="widget-product-item d-flex align-items-center">
                                        <div class="widget-product__img">
                                            <a href="{{ route('home.product.single', ['slug' => $topProduct->slug]) }}"><img
                                                    src="{{ asset('images/' . $topProduct->image) }}" alt="Product"
                                                    loading="lazy"></a>
                                        </div><!-- /.product-product-img -->
                                        <div class="widget-product__content">
                                            <h5 class="widget-product__title"><a
                                                    href="{{ route('home.product.single', ['slug' => $topProduct->slug]) }}">{{ $topProduct->name }}</a>
                                            </h5>
                                            <span
                                                class="widget-product__price">{{ number_format($topProduct->price, 0, '.', ',') }}</span>
                                        </div><!-- /.widget-product-content -->
                                    </div><!-- /.widget-product-item -->
                                @endforeach
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-poducts -->


                        {{-- <div class="widget widget-filter">
                            <h5 class="widget__title">Pricing Filter</h5>
                            <div class="widget__content">
                                <div id="rangeSlider"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price-output d-flex align-items-center">
                                        <label for="rangeSliderResult">Price: </label>
                                        <input type="text" id="rangeSliderResult" readonly>
                                    </div>
                                    <button class="btn__filter">Filter</button>
                                </div>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-filter --> --}}


                        {{-- <div class="widget widget-tags">
                            <h5 class="widget__title">Tags</h5>
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    <li><a href="#">Responsive</a></li>
                                    <li><a href="#">Fresh</a></li>
                                    <li><a href="#">Modern</a></li>
                                    <li><a href="#">Corporate</a></li>
                                    <li><a href="#">Business</a></li>
                                </ul>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-Tags --> --}}
                    </aside><!-- /.sidebar -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.shop -->
@endsection

@section('title')
    Products
@endsection

@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                let url = $(this).data('url');
                let qty = 1;
                url = `${url}/${qty}`;
                $.ajax({
                    method: 'get', //method form
                    url: url, //action form
                    success: function(response) {
                        if (response.result) {
                            Swal.fire({
                                icon: 'success',
                                // title: 'Notification',
                                text: response.message,
                            });
                            $('#total-product').html(`Shopping cart - ${response.total_items}`);
                            if (!response.qty_remain) {
                                $('.add-to-cart').css('pointer-events', 'none');
                                $('.add-to-cart').html('Sold Out');
                                $(".add-to-cart").removeClass("btn__primary").addClass(
                                    "btn-danger");
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                // title: 'Notification',
                                text: response.message,
                            });
                        }
                    },
                    statusCode: {
                        401: function() {
                            window.location.href = '{{ route('login') }}';
                        },
                        404: function() {
                            Swal.fire({
                                icon: 'error',
                                text: "Can't add product to cart",
                            });
                        },
                    },
                });
            });
        });
    </script>
@endsection
