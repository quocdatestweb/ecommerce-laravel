
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
    <link rel="shortcut icon" href="https://cdn-icons-png.freepik.com/256/10112/10112502.png?semt=ais_hybrid" type="image/vnd.microsoft.icon" />
    <style>
        body {
            background: #eee;
        }
    </style>
    <title>Product</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">Xin chào: {{$name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Manage Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.admin') }}">Manage Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.logoutPost') }}">Logout</a>
            </li>
        </ul>
    </nav>

    <main role="main">

        <div class="Product py-5 bg-light">

            <div class="container">

                <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/4/22/638493962838593257_F-H1_800x300.png"
                    alt="" srcset="" style="width: 100%">

                <!-- Button trigger modal -->
                <div class="d-flex justify-content-end align-items-center pt-5">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Add Product
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img id="previewImage"
                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrry8DgkBABK5kwWuB-IuS6mOjidDslFsNXb3Jh9NH6Q&s"
                                                        alt="product" width="150">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="thumbImage">Thumbnail Image</label>
                                                <div class="custom-file">
                                                    <input name="thumbImage" type="file" class="custom-file-input"
                                                    id="imageUpload" accept="image/*">
                                                    <label class="custom-file-label" for="customFileLang"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" id="price"
                                                    name="price" step="0.01" required>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="author_id">Author ID</label>
                                                <select class="form-control" id="author_id" name="author_id"
                                                    required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"> {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                    <!-- Include options for categories here -->
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="author_type">Author Type</label>
                                                <select class="form-control" id="author_type" name="author_type"
                                                    required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}"> {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                    <!-- Include options for categories here -->
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="categoryid">Category</label>
                                                <select class="form-control" id="categoryid" name="categoryid"
                                                    required>
                                                    @foreach ($categorys as $category)
                                                        <option value="{{ $category->id }}"> {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                    <!-- Include options for categories here -->
                                                </select>
                                            </div>

                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>

                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-5">
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="btn-group">
                                        <form id="deleteForm" action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                            method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm bg-white"
                                                onclick="confirmDelete(event)"><i
                                                    class="fa fa-trash text-danger"></i></button>
                                        </form>
                                        <form action="{{ route('products.edit', ['id' => $product->id]) }}" method="get">
                                            @csrf

                                            <button type="submit" class="btn btn-sm bg-white"><i
                                                    class="fa fa-pencil text-warning bg-white"></i></button>
                                        </form>
                                        <form action="{{ route('products.show', ['id' => $product->id]) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-sm bg-white"><i
                                                    class="fa fa-eye text-success"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <img class="card-img-top"
                                        alt="Thumbnail [100%x225]" src="{{ url('image/product/'.$product->ThumbImage) }}"
                                        data-holder-rendered="true" style="height: 50%; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">{{ $product->Name }}</p>
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
                                        {{-- <small class="text-muted"> {{ $product->category->description }}</small> --}}
                                        <small class="text-muted"> {{ $product->category->name }}</small>
                                        <h6 class="text-primary"><b>${{ $product->Price }}</b></h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $products->links('products::custom-pagination') }}
                    {{-- <p>Trang hiện tại: {{ $products->currentPage() }}</p> --}}
                </div>
            </div>

        </div>

        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a >Back to top</a>
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
        // Function to handle the image upload
        function handleImageUpload() {
            const fileInput = document.getElementById('imageUpload');
            const previewImage = document.getElementById('previewImage');

            // Check if a file is selected
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        // Attach event listener to the file input
        document.getElementById('imageUpload').addEventListener('change', handleImageUpload);
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
