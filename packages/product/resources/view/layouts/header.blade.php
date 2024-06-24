<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +066-141-8516</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> dat.nguyen@opsgreat.vn</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>19 Nguyễn Hữu Thọ, phường Tân Phong, Quận 7, TP HCM</a></li>
            </ul>
            <ul class="header-links pull-right">
                {{-- @if ($role != 0 || $role != 1)
                    <li><a href="{{ route('user.register') }}"><i class="fa fa-registered"></i> Đăng ký</a></li>
                    <li><a href="{{ route('user.login') }}"><i class="fa fa-user-o"></i> Đăng nhập</a></li>
                @elseif ($role == 0 || $role == 1)
                     <li><a href="{{ route('user.logoutPost') }}"><i class="fa fa-user-o"></i> Đăng xuất</a></li>
                @endif
        --}}

            @if ($name == "")

            <li><a href="{{ route('user.register') }}"><i class="fa fa-registered"></i> Đăng ký</a></li>
            <li><a href="{{ route('user.login') }}"><i class="fa fa-user-o"></i> Đăng nhập</a></li>
            @elseif ($name !="")
            @php
            $id_users = $id_user;
            @endphp
            <li><a style="color: white ">{{$name}}</a></li>
            <li>
                <div style="padding-top: 5%">
                    <form action="{{ route('user.viewsprize') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <input type="hidden" name="iduser" id="iduser" value="{{ $id_users }}">
                        <button type="submit" style="background-color: transparent; border: none; cursor: pointer; display: flex; align-items: center;">
                            <i class="fa fa-gift" style="color: white; margin-right: 0.5rem;"></i>
                            <span style="color: white; font-size: 13px;">Quà tặng</span>
                        </button>
                    </form>
                </div>
            <li><a href="{{ route('user.logoutPost') }}"><i style="color: white;" class="fa fa-power-off"></i> Đăng xuất</a></li>
            @endif

            </ul>
        </div>
    </div>
    
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('products.products_user')}}" class="logo">
                            <img width="60" src="https://seeklogo.com/images/J/jiomart-logo-CFA2176800-seeklogo.com.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('products.search') }}" method="POST">
                            @csrf
                            <select class="input-select" name="categoryid">
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="productname" class="input" placeholder="Search here">
                            <button class="search-btn" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                       
                        @if ($name == "")
                        @elseif ($name !="")
                        <div style="padding-top: 5%">
                            <form action="{{ route('user.viewdoder') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="iduser" id="iduser" value="{{ $id_user }}">
                                <button type="submit" style="background-color: transparent; border: none; cursor: pointer; display: flex; align-items: center;">
                                    <i class="fa fa-shopping-cart" style="color: white; margin-right: 0.5rem;"></i>
                                    <span style="color: white; font-size: 13px;">Lịch sử</span>
                                </button>
                            </form>
                        </div>


                        @endif

                        <!-- Cart -->
                        <div class="dropdown" style="padding-top: 5%">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="background-color: transparent; border: none; cursor: pointer; display: flex; align-items: center;">
                                <i class="fa fa-cart-arrow-down" style="color: white; margin-right: 0.5rem;"></i>
                                @if (session()->has('cart') && count(session('cart')) > 0)
                                <div class="qty" style="margin-top: -5px; margin-right: -5px;">{{ session('cart_count') }}</div>
                            @else
                            @endif
                                <span>Giỏ hàng</span>
                            </a>
                            <div class="cart-dropdown">
                                @php
                                    $total_price = 0;
                                    $total_prices = 0 . '₫'; // Initialize $total_prices with an empty string
                                @endphp
                                <div class="cart-list">
                                    <!-- Kiểm tra nếu giỏ hàng có sản phẩm -->
                                    @if (session()->has('cart') && count(session('cart')) > 0)
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

                                                if (isset($total_price)) {
                                                    $total_prices = number_format($total_price, 0, ',', '.') . '₫';
                                                }
                                            @endphp
                                            <div class="product-widgets">
                                                <div class="product-img">
                                                    <img src="{{ url('image/product/' . $img_src) }}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a
                                                            href="{{ route('products.show', ['id' => $productId]) }}">{{ $productName }}</a>
                                                    </h3>

                                                    <h6 class="product-prices"><span style="font-weight: 200; margin-right: 10px;" class="qtys"> {{ $quantity }}
                                                        x</span> {{ $prices }}</h6>
                                                </div>
                                                <button class="delete remove-from-cart-btn"
                                                    data-product-id="{{ $productId }}"><i
                                                        class="fa fa-close"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <!-- Hiển thị thông báo giỏ hàng trống -->
                                        <div class="text-center">
                                            <img width="150"
                                                src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png"
                                                alt="">
                                            <p>Giỏ hàng trống.</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="cart-summary">
                                    <small><span id="count">{{ session('cart_count') }} </span> Sản phẩm được
                                        chọn.</small>
                                    <h5>TẠM TÍNH TỔNG: <span id="total-prices">{{ $total_prices }}</span></h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{ route('cart.view') }}">View Cart</a>
                                    <a href="{{ route('cart.checkout') }}">Checkout <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                        </div>
                             <!-- Wishlist -->
                         
                           
                            <!-- /Wishlist -->
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
