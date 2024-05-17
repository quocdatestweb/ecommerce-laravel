@extends('products::layouts.app')
@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session('success') }}
              </div>
        @endif
            <!-- row -->
            <div class="row">

                <form action="{{ route('cart.placeorder') }}" method="POST">
                    @csrf
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thông tin thanh toán</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="full-name" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <!-- /Billing Details -->

                        <!-- Shiping Details -->
                        <div class="shiping-details">
                            <div class="section-title">
                                <h3 class="title">Địa chỉ giao hàng</h3>
                            </div>

                        </div>
                        <!-- /Shiping Details -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea name="address" class="input" placeholder="Order Notes"></textarea>
                        </div>
                        <!-- /Order notes -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Đơn Hàng Của Bạn</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>SẢN PHẨM</strong></div>
                                <div><strong>TỔNG CỘNG</strong></div>
                            </div>
                            @php
                                $total_price = 0;
                            @endphp
                            @if (count($cart) > 0)
                                <div class="order-products">
                                    @foreach ($products as $product)
                                        @php
                                            $total_price =
                                                $total_price + $product->Price * $cart[$product->id]['quantity'];
                                            $total_prices = number_format($total_price + 70000, 0, ',', '.') . '₫';
                                            $price = number_format($product->Price, 0, ',', '.') . '₫';
                                            $min_total =
                                                number_format(
                                                    $product->Price * $cart[$product->id]['quantity'],
                                                    0,
                                                    ',',
                                                    '.',
                                                ) . '₫';
                                            $sub_total = number_format($total_price, 0, ',', '.') . '₫';

                                        @endphp
                                        <div class="order-col">
                                            <div class="product-img">
                                                <img style="width: 50px"
                                                    src="{{ url('image/product/' . $product->ThumbImage) }}" alt="">
                                            </div>

                                            <div>
                                                <p style="color: #D10024"><b> {{ $product->Name }}</b></p>
                                                {{ $cart[$product->id]['quantity'] }}x {{ $price }}
                                            </div>
                                            <div><strong>{{ $min_total }}</strong></div>
                                        </div>
                                    @endforeach
                                    <div class="order-col">
                                        <div>Phí ship</div>
                                        <div><strong>70.000₫</strong></div>
                                    </div>
                                    <div class="order-col">
                                        <div><strong>TỔNG CỘNG</strong></div>
                                        <div><strong class="order-total">{{ $total_prices }}</strong></div>
                                    </div>
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="terms">
                                        <label for="terms">
                                            <span></span>
                                            Tôi đã đọc và chấp nhận các điều khoản & điều kiện</a>
                                        </label>
                                    </div>
                                    <button type="sbmit" class="primary-btn order-submit">Đặt hàng</button>
                                @else
                                    <div class="text-center">
                                        <img width="220" src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" alt="">
                                        <p>Giỏ hàng trống.</p>
                                    </div>
                            @endif

                        </div>


                    </div>

            </div>



        </div>
        </form>
        <!-- /Order Details -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
@endsection
