<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <form action="{{ route('products.products_category') }}" method="POST">
                <ul class="main-nav nav navbar-nav">
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

            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
