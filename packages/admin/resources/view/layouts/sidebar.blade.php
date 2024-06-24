<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="https://seeklogo.com/images/J/jiomart-logo-CFA2176800-seeklogo.com.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{$name}}</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{route('admin.index')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">PRODUCTS</li>
            <li>

                <li>
                    <a href="{{route('admin.index')}}"><i class="sidebar-item-icon fa-brands fa-product-hunt"></i>
                        <span class="nav-label">Danh sách sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.add')}}"><i class="sidebar-item-icon fa-regular fa-square-plus"></i>
                        <span class="nav-label">Thêm sản phẩm</span>
                    </a>
                </li>

            </li>

            <li class="heading">POSTS</li>
            <li>
                <li>
                    <a href="{{route('admin.listpost')}}"><i class="sidebar-item-icon fa-solid fa-newspaper"></i>
                        <span class="nav-label">Danh sách bài viết</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.addpost')}}"><i class="sidebar-item-icon fa-solid fa-plus"></i>
                        <span class="nav-label">Thêm bài viết</span>
                    </a>
                </li>
            </li>
            
            <li class="heading">ORDERS</li>
            <li>
                <li>
                    <a href="{{route('cart.details')}}"><i class="sidebar-item-icon fa-solid fa-cart-plus"></i>
                        <span class="nav-label">Thống kê đơn hàng</span>
                    </a>
                </li>
            </li>
            <li class="heading">GIFTS</li>
            <li class="">
                <a href="javascript:;" aria-expanded="false"><i class="sidebar-item-icon fa fa-gift"></i>
                    <span class="nav-label">Quản lý quà tặng</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse" aria-expanded="false" style="height: 0px;">
                    <li>
                        <a  href="{{route('admin.gift')}}">Danh sách quà tặng</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.winner')}}">Danh sách trúng thưởng</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
