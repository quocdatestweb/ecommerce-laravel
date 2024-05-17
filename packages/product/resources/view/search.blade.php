@extends('products::layouts.app')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">SẢN PHẨM LIÊN QUAN: {{$productname}}</h3>
                        <div class="section-nav">
                            <form action="{{ route('products.products_category') }}" method="GET">
                                @csrf
                                <ul class="section-tab-nav tab-nav">
                                    <li class="{{ empty(request('category')) ? 'active' : '' }}"><a href="{{route('products.products_user')}}">Tất cả</a></li>
                                    @foreach ($categorys as $category)
                                        <li class="{{ $category->id == request('category') ? 'active' : '' }}">
                                            <a href="{{ route('products.products_category', ['category' => $category->id]) }}"
                                                aria-expanded="{{ $category->id == request('category') ? 'true' : 'false' }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @if ($products->isEmpty())
                                    <img src="https://www.kauverymeds.com/assets/img/No_Product_Found.png" alt="">
                                     @else
                                    @foreach ($products as $product)
                                        @php
                                            $price = $product->Price ;
                                            $prices = number_format($price, 0, ',', '.') . '₫';
                                        @endphp
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ url('image/product/' . $product->ThumbImage) }}"
                                                    alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $product->category->name }}</p>
                                                <h3 class="product-name"><a
                                                        href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->Name }}</a>
                                                </h3>
                                                <h4 class="product-price">{{ $prices}}</h4>
                                                <div class="product-rating">
                                                    @php
                                                        $k = rand(1, 4);
                                                        // Alternatively, you can use: $k = Str::random();
                                                    @endphp
                                                    @for ($i = 1; $i <= $k; $i++)
                                                        <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                    <i class="fa fa-star-o"></i>

                                                </div>
                                            </div>
                                            {{-- <div class="add-to-cart">
                                                <a type="button" href="{{ route('products.show', ['id' => $product->id]) }}" class="add-to-cart-btn" style="padding: 5px">Thêm vào giỏ hàng</a>
                                            </div> --}}
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                                {{-- {{ $products->links('products::custom-pagination') }} --}}

                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



@endsection
