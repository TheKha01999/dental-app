@extends('client.layout.master')

@section('content')
    <section class="page-title pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section class="shop pb-40 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row product-item-single">
                        <div class="col-sm-6">
                            <div class="product__img">
                                <img src="{{ asset('images/' . $product->image) }}" class="zoomin" alt="product"
                                    loading="lazy">
                            </div><!-- /.product-img -->
                        </div>
                        <div class="col-sm-6">
                            <h1 class="product__title">{{ $product->name }}</h1>
                            <div class="product__meta-review mb-20">
                                <span class="product__rating">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span>4 Review(s)</span>
                                <a href="#">Add Review</a>
                            </div><!-- /.product-meta-review -->
                            <span class="product__price mb-20">$ {{ $product->price }}</span>
                            <div class="product__desc">
                                <p>{{ $product->short_description }}
                                </p>
                            </div><!-- /.product-desc -->
                            <div class="product__quantity d-flex mb-30">
                                <div class="quantity__input-wrap mr-20"
                                    data-url="{{ route('home.product.update-item-in-cart', ['productId' => $product->id]) }}"
                                    data-id="{{ $product->id }}">

                                    <i class="decrease-qty fa fa-minus qtybtn"></i>
                                    <input type="number" value="1" class="qty-input">
                                    <i class="increase-qty fa fa-plus qtybtn"></i>

                                </div>
                                <a data-url="{{ route('home.product.add-to-cart', ['productId' => $product->id]) }}"
                                    class="btn btn__secondary btn__rounded add-to-cart" href="#">add to cart</a>
                            </div><!-- /.product-quantity -->
                            <div class="product__meta-details">
                                <ul class="list-unstyled mb-30">
                                    {{-- <li><span>SKU :</span> <span>#0214</span></li> --}}
                                    <li><span>Stock:</span>
                                        <span>{{ $product->qty >= '1' ? 'Available' : 'Sold out' }}</span>
                                    </li>
                                    <li><span>Category :</span> <span>{{ $product->product_category_name }}</span></li>
                                    <li><span>Tags :</span> <span>Beauty, Supplements</span></li>
                                </ul>
                            </div><!-- /.product__meta-details -->
                            <ul class="social-icons list-unstyled mb-0">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            </ul><!-- /.social-icons -->
                        </div>
                    </div><!-- /.row -->
                    <div class="product__details mt-100">
                        <nav class="nav nav-tabs">
                            <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                            <a class="nav__link" data-toggle="tab" href="#Details">Details</a>
                            <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
                        </nav>
                        <div class="tab-content mb-50" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="Description">
                                <p>{{ $product->description }}</p>
                            </div><!-- /.desc-tab -->
                            <div class="tab-pane fade" id="Details">
                                <p>{{ $product->information }}</p>
                            </div><!-- /.details-tab -->
                            <div class="tab-pane fade" id="Reviews">
                                <form class="reviews__form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Review"></textarea>
                                    </div><!-- /.form-group -->
                                    <button type="submit" class="btn btn__primary btn__rounded">Submit</button>
                                </form>
                            </div><!-- /.reviews-tab -->
                        </div>
                    </div><!-- /.product-tabs -->
                    <h6 class="related__products-title text-center-xs mb-25">Related Products</h6>
                    <div class="row">
                        <!-- Product item #1 -->
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product__img">
                                    <img src="assets/images/products/2.jpg" alt="Product" loading="lazy">
                                    <div class="product__action">
                                        <a href="#" class="btn btn__primary btn__rounded">
                                            <i class="icon-cart"></i> <span>Add To Cart</span>
                                        </a>
                                    </div><!-- /.product-action -->
                                </div><!-- /.product-img -->
                                <div class="product__info">
                                    <h4 class="product__title"><a href="#">Biotin Complex</a></h4>
                                    <span class="product__price">$12,9</span>
                                </div><!-- /.product-content -->
                            </div><!-- /.product-item -->
                        </div><!-- /.col-lg-3 -->
                        <!-- Product item #2 -->
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product__img">
                                    <img src="assets/images/products/3.jpg" alt="Product" loading="lazy">
                                    <div class="product__action">
                                        <a href="#" class="btn btn__primary btn__rounded">
                                            <i class="icon-cart"></i> <span>Add To Cart</span>
                                        </a>
                                    </div><!-- /.product-action -->
                                </div><!-- /.product-img -->
                                <div class="product__info">
                                    <h4 class="product__title"><a href="#">Facial Serum</a></h4>
                                    <span class="product__price">$19,99</span>
                                </div><!-- /.product-content -->
                            </div><!-- /.product-item -->
                        </div><!-- /.col-lg-3 -->
                        <!-- Product item #3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product__img">
                                    <img src="assets/images/products/4.jpg" alt="Product" loading="lazy">
                                    <div class="product__action">
                                        <a href="#" class="btn btn__primary btn__rounded">
                                            <i class="icon-cart"></i> <span>Add To Cart</span>
                                        </a>
                                    </div><!-- /.product-action -->
                                </div><!-- /.product-img -->
                                <div class="product__info">
                                    <h4 class="product__title"><a href="#">Calming Herps</a></h4>
                                    <span class="product__price">$33.00</span>
                                </div><!-- /.product-content -->
                            </div><!-- /.product-item -->
                        </div><!-- /.col-lg-3 -->
                        <!-- Product item #4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product__img">
                                    <img src="assets/images/products/5.jpg" alt="Product" loading="lazy">
                                    <div class="product__action">
                                        <a href="#" class="btn btn__primary btn__rounded">
                                            <i class="icon-cart"></i> <span>Add To Cart</span>
                                        </a>
                                    </div><!-- /.product-action -->
                                </div><!-- /.product-img -->
                                <div class="product__info">
                                    <h4 class="product__title"><a href="#">Essential Oil</a></h4>
                                    <span class="product__price">$63.00</span>
                                </div><!-- /.product-content -->
                            </div><!-- /.product-item -->
                        </div><!-- /.col-lg-3 -->
                    </div><!-- /.row -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.shop single -->
@endsection

@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                let url = $(this).data('url');
                let qty = $('.qty-input').val();
                url = `${url}/${qty}`;

                $.ajax({
                    method: 'get', //method form
                    url: url, //action form
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            // title: 'Notification',
                            text: response.message,
                        });
                        $('#total-product').html(`Shopping cart - ${response.total_items}`);
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
