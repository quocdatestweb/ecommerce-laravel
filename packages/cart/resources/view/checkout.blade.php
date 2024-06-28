@extends('products::layouts.app')
@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
          
            <!-- row -->
            <div class="row">
                @if  ($name == "")

                <div class="col-md-7">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        Vui lòng đăng nhập để thanh toán!
                    </div>
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Thông tin thanh toán</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="full-name" placeholder="Họ và tên" disabled>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email" disabled>
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
                        <textarea name="address" class="input" placeholder="Địa chỉ giao hàng" disabled></textarea>
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
                                    <input type="checkbox" id="terms" disabled>
                                    <label for="terms">
                                        <span></span>
                                        Tôi đã đọc và chấp nhận các điều khoản & điều kiện</a>
                                    </label>
                                </div>
                                <button  type="sbmit" class="primary-btn order-submit" disabled>Đặt hàng</button>
                            @else
                                <div class="text-center">
                                    <img width="220" src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" alt="">
                                    <p>Giỏ hàng trống.</p>
                                </div>
                        @endif

                    </div>


                </div>

                @else
                    
            <form action="{{ route('cart.placeorder') }}" method="POST">
                @csrf
            
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Thông tin thanh toán</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="hidden" name="id_user" value="{{ $id_user }}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="full-name" placeholder="Họ và tên" value="{{ $name }}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email" value="{{ $email }}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Số điện thoại">
                        </div>
                        {{-- <div class="form-group">
                            <input class="input" type="text" name="coupon-code" placeholder="Coupon">
                        </div> --}}
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
                        <textarea name="address" class="input" placeholder="Địa chỉ giao hàng"></textarea>
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

        
                    <!-- Kiểm tra nếu giỏ hàng có sản phẩm -->
                    @php
                    $total_price = 0;
                    @endphp
                    <!-- Kiểm tra nếu giỏ hàng có sản phẩm -->
                    @if (session()->has('cart') && count(session('cart')) > 0)
                            <div class="order-products">
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
                                <strong>Điều kiện và Điều khoản Giao hàng</strong>
                                <br>
                                <div class="section-title text-center">
                                    <a type="button" class="primary-btn order-submit toggle-btn">Xem thêm</a>
                                </div>

                                <div class="input-checkbox shipping-terms" style="display: none;" >
                                    <br>
                                    <strong>1. Thời gian giao hàng</strong>
                                    <ul>
                                      <li>Thời gian giao hàng thông thường là 3-5 ngày làm việc kể từ ngày đặt hàng.</li>
                                      <li>Trong trường hợp sản phẩm hết hàng hoặc do lý do bất khả kháng, chúng tôi sẽ thông báo cho khách hàng và cung cấp thời gian giao hàng mới.</li>
                                    </ul>
                                    
                                    <strong>2. Phí vận chuyển</strong>
                                    <ul>
                                      <li>Miễn phí vận chuyển cho đơn hàng trên 5.000.000 VND.</li>
                                      <li>Đối với đơn hàng dưới 500.000 VND, phí vận chuyển là 30.000 VND.</li>
                                    </ul>
                                    
                                    <strong>3. Chính sách đổi trả</strong>
                                    <ul>
                                      <li>Khách hàng có quyền đổi trả sản phẩm trong vòng 7 ngày kể từ ngày nhận hàng.</li>
                                      <li>Sản phẩm phải còn nguyên vẹn, chưa qua sử dụng và có hóa đơn mua hàng.</li>
                                      <li>Chúng tôi sẽ hoàn trả 100% giá trị sản phẩm cho khách hàng.</li>
                                    </ul>
                                    
                                    <strong>4. Bảo hành</strong>
                                    <ul>
                                      <li>Sản phẩm được bảo hành trong vòng 12 tháng kể từ ngày mua.</li>
                                      <li>Bảo hành áp dụng cho các lỗi do nhà sản xuất gây ra, không bao gồm lỗi do sử dụng sai hoặc hư hỏng do va đập.</li>
                                    </ul>
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
                   </form>
                @endif

        <!-- /Order Details -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <script>
        const toggleBtn = document.querySelector('.toggle-btn');
        const shippingTerms = document.querySelector('.shipping-terms');
    
        toggleBtn.addEventListener('click', () => {
          shippingTerms.classList.toggle('show');
          if (shippingTerms.classList.contains('show')) {
            toggleBtn.textContent = 'Ẩn';
          } else {
            toggleBtn.textContent = 'Xem thêm';
          }
        });
      </script>
@endsection
