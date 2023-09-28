@extends('client.layout.master')

@section('content')
    <!-- ========================
                                                                                                                                                                                                                                                                                                                                                                           page title
                                                                                                                                                                                                                                                                                                                                                                        =========================== -->
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

    <!-- =========================
                                                                                                                                                                                                                                                                                                                                                                                      Shopping Cart
                                                                                                                                                                                                                                                                                                                                                                              =========================== -->
    <section class="shopping-cart pt-0 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach ($cart as $productId => $item)
                                    @php $total += $item['qty'] * $item['price'] @endphp
                                    <tr id="{{ $productId }}" class="cart-product">
                                        <td class="d-flex align-items-center">
                                            <i class="fas fa-times cart-product__remove" data-id="{{ $productId }}"
                                                data-url="{{ route('home.product.delete-item-in-cart', ['productId' => $productId]) }}"></i>
                                            <div class="cart-product__img">
                                                <img src="{{ $item['image'] }}" alt="product" />
                                            </div>
                                            <h5 class="cart-product__title">{{ $item['name'] }}</h5>
                                        </td>
                                        <td class="cart-product__price">$ {{ number_format($item['price'], 2) }}</td>
                                        <td class="cart-product__quantity">
                                            <div class="quantity__input-wrap" data-price="{{ $item['price'] }}"
                                                data-url="{{ route('home.product.update-item-in-cart', ['productId' => $productId]) }}"
                                                data-id="{{ $productId }}">

                                                <i class="fa fa-minus decrease-qty qtybtn"></i>
                                                <input type="number" value="{{ $item['qty'] }}" class="qty-input">
                                                <i class="fa fa-plus increase-qty qtybtn"></i>

                                            </div>
                                        </td>
                                        <td class="cart-product__total">$
                                            {{ number_format($item['qty'] * $item['price'], 2) }}</td>
                                    </tr>
                                @endforeach
                                {{-- <tr class="cart-product">
                                    <td class="d-flex align-items-center">
                                        <i class="fas fa-times cart-product__remove"></i>
                                        <div class="cart-product__img">
                                            <img src="assets/images/products/3.jpg" alt="product" />
                                        </div>
                                        <h5 class="cart-product__title">Biotin Complex</h5>
                                    </td>
                                    <td class="cart-product__price">$ 14.00</td>
                                    <td class="cart-product__quantity">
                                        <div class="quantity__input-wrap">
                                            <i class="fa fa-minus decrease-qty"></i>
                                            <input type="number" value="1" class="qty-input">
                                            <i class="fa fa-plus increase-qty"></i>
                                        </div>
                                    </td>
                                    <td class="cart-product__total">$ 39.00</td>
                                </tr> --}}
                                <tr class="cart-product__action">
                                    <td colspan="4">
                                        <div
                                            class="cart-product__action-content d-flex align-items-center justify-content-between">
                                            <form class="d-flex flex-wrap">
                                                <input type="text" class="form-control mb-10 mr-10"
                                                    placeholder="Coupon Code">
                                                <button type="submit" class="btn btn__secondary mb-10">Apply
                                                    Coupon</button>
                                            </form>
                                            <div>
                                                <a class="btn btn__secondary mr-10" href="#">update cart</a>
                                                <a class="btn btn__secondary" href="#">Checkout</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.cart-table -->
                </div><!-- /.col-lg-12 -->

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="cart__total-amount">
                        <h6>Cart Totals</h6>
                        <ul class="list-unstyled mb-30">
                            <li><span>Cart Subtotal :</span><span class="total_checkout">$
                                    {{ number_format($total, 2) }}</span></li>
                            <li><span>Order Total :</span><span class="total_checkout">$
                                    {{ number_format($total, 2) }}</span>
                            </li>
                        </ul>
                        <a href="#" class="btn btn__primary">Proceed To Checkout</a>
                    </div><!-- /.cart__total-amount -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.shopping-cart -->
@endsection
@section('title')
    Shopping-cart
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.cart-product__remove').on('click', function() {
                let url = $(this).data('url');
                let id = $(this).data('id');

                $.ajax({
                    method: 'get',
                    url: url,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        $(`tr#${id}`).empty();
                    }
                });
            });
            $('.qtybtn').on('click', function() {
                let button = $(this);
                let id = button.parent().data('id');
                let qty = parseInt(button.siblings('.qty-input').val());
                let url = button.parent().data('url');

                let price = parseFloat(button.parent().data('price'));
                //totalPrice cua 1 san pham
                let totalPrice = price * qty;

                url = `${url}/${qty}`;

                // alert(url)
                // return;

                $.ajax({
                    method: 'GET',
                    url: url,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        //chỗ này chỉ hiển thị lên màn hình thôi, lúc load lại thì bên html đã lấy qty * price rồi nên thấy đúng, nếu k có dòng dưới thì phải đc load lại trang mới thấy đc               
                        $(`tr#${id} .cart-product__total`).html("$ " + totalPrice.toFixed(2)
                            .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));


                        // $('#total-product').html("Shopping cart - "
                        //     response.total_items);
                        // $('#total-price-cart').html('$' + response.total_price.toFixed(2)
                        //     .replace(
                        //         /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

                        //response.total_price la total cua tat ca product
                        $('.total_checkout').html('$ ' + response.total_price.toFixed(2)
                            .replace(
                                /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    }
                });
            });
        });
    </script>
@endsection
