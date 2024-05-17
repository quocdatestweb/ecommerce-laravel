<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Product</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.freepik.com/256/10112/10112502.png?semt=ais_hybrid"
        type="image/vnd.microsoft.icon" />
    <style>
        body {
            background: #eee;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.user') }}">Show Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.user') }}">Show Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.login') }}">Login</a>
            </li>
        </ul>
    </nav>


    <main role="main">

        <div class="Product py-5 bg-light">

            <div class="container">

                <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/4/22/638493962838593257_F-H1_800x300.png"
                    alt="" srcset="" style="width: 100%">

                <div class="row pt-5">
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}" style="text-decoration:none">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" alt="Thumbnail [100%x225]"
                                        src="{{ url('image/product/' . $product->ThumbImage) }}"
                                        data-holder-rendered="true" style="height: 50%; width: 100%; display: block;">
                                    <div class="card-body">
                                        <p class="card-text text-secondary">{{ $product->Name }}</p>
                                        <div class="star">
                                            @php
                                                $k = rand(1, 5);
                                                // Alternatively, you can use: $k = Str::random();
                                            @endphp
                                            @for ($i = 1; $i <= $k; $i++)
                                                <i class="fa fa-star text-warning"></i>
                                            @endfor
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"> {{ $product->category->name }}</small>

                                            <h6 class="text-primary"><b>${{ $product->Price }}</b></h6>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $products->links('products::custom-pagination') }}
                    {{-- <p>Trang hiện tại: {{ $products->currentPage() }}</p> --}}
                </div>
            </div>

        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a>Back to top</a>
            </p>
            <p>Product example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a
                    href="../../getting-started/">getting started guide</a>.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script>
        function confirmDelete(event) {
            // Hiển thị hộp thoại xác nhận
            var result = confirm("Bạn có chắc chắn muốn xóa?");

            // Nếu người dùng chọn "OK" (đồng ý xóa), tiếp tục gửi form
            if (result) {
                document.getElementById('deleteForm').submit();
            } else {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện click
            }
        }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
