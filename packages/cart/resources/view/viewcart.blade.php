@extends('products::layouts.app')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Details -->
                    <div class="card mb-4">

                        @php
                            $total_price = 0;
                        @endphp
                        <!-- Kiểm tra nếu giỏ hàng có sản phẩm -->
                        @if (session()->has('cart') && count(session('cart')) > 0)
                            <table class="table table-borderless">
                                <tbody>
                                    <!-- Lặp qua từng sản phẩm trong giỏ hàng -->
                                    @foreach (session('cart') as $item)
                                        <!-- Lấy thông tin sản phẩm từ mảng -->
                                        @php
                                            $productId = $item['product_id'];
                                            $productName = htmlspecialchars($item['name']);
                                            $quantity = $item['quantity'];
                                            $img_src = $item['img_src'];
                                            $price = $item['price'];
                                            $prices = number_format($price, 0, ',', '.') . '₫';
                                            $total_price = $total_price + $price * $quantity;
                                            $total_prices = number_format($total_price + 70000, 0, ',', '.') . '₫';
                                            $total = number_format($total_price, 0, ',', '.') . '₫';
                                            $min_total =
                                                number_format($price * $cart[$productId]['quantity'], 0, ',', '.') .
                                                '₫';
                                            $sub_total = number_format($total_price, 0, ',', '.') . '₫';

                                        @endphp
                                        <tr class="product-widget">
                                            <td>
                                                <div>
                                                    <div class="product-img">
                                                        <img style="width: 80px" src="{{ url('image/product/' . $img_src) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="product-body" style="margin-left: 5%">
                                                        <h3 class="product-name"><a
                                                                href="{{ route('products.show', ['id' => $productId]) }}">{{ $productName }}</a>
                                                        </h3>
                                                        <h4 class="product-price">{{ $prices }}</h4>
                                                        <p class="product-category">QTY: {{ $quantity }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="padding-top: 3%;" class="text-end"><b>{{ $min_total }}</b></td>
                                            <td style="padding-top: 3%;">
                                                <button class="btn btn-sm delete remove-from-cart-btn"
                                                    data-product-id="{{ $productId }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="1"><b>Tạm tính</b></td>
                                        <td class="text-end"><b>{{ $sub_total }}</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"><b>Phí ship</b></td>
                                        <td class="text-end"><b>70.000₫</b></td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="2">Discount (Code: NEWYEAR)</td>
                                        <td class="text-danger text-end">-$10.00</td>
                                    </tr> --}}
                                    <tr class="fw-bold" style="color: #D10024">
                                        <td colspan="1"><b>TỔNG CỘNG</b></td>
                                        <td class="text-end"><b>{{ $total_prices }}</b></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="cart-btns">
                                <a class="primary-btn cta-btn" href="{{ route('cart.checkout') }}">Check out <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <div class="text-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" alt="" style="width: 30%">
                                <p>Giỏ hàng trống. </p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- /container -->
    </div>
@endsection
