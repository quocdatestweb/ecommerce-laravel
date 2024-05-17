@extends('admin::layouts.app')
@section('content')
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div>
                                <img id="previewImage" style="width: 300px"
                                    src="{{ url('image/product/' . $products->ThumbImage) }}" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name">{{ $products->Name }}</h5>
                            <h3 class="user-email text-danger">${{ $products->Price }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <form id="updateForm" method="POST" action="{{ route('products.update', $products->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Product Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $products->Name }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $products->Price }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Author</label>
                                    <select class="form-control" id="author_id" name="author_id" required>
                                        <option value="{{ $products->Author_ID }}-{{ $products->Author_Type }}">
                                            {{ $products->Author_Type }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}-{{ $user->name }}">
                                                {{ $user->name }}</option>
                                        @endforeach
                                        <!-- Include options for categories here -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="category"> Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="{{ $products->CategoryID }}">
                                            {{ $products->category->name }}</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }}
                                            </option>
                                        @endforeach
                                        <!-- Include options for categories here -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="create_at">Date</label>
                                    <input name="created_at" type="datetime-local" class="form-control" id="create_at"
                                        value="{{ $products->created_at }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <br>
                                    <div class="custom-file">
                                        <input name="thumbImage" type="file" class="form-control" id="imageUpload"
                                            accept="image/*">
                                        <label class="custom-file-label" for="customFileLang"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="content" required>{{ $products->Content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="btn-group">
                                        <button onclick="confirmUpdate(event)" type="submit" id="submit" name="submit"
                                            class="btn btn-primary">Update</button>
                                        <button onclick="clearForm()" class="btn btn-danger ml-2">Clear
                                            Form</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

        function clearForm() {
            var form = document.getElementById('updateForm');
            var fields = form.querySelectorAll('input, textarea, select');

            for (var i = 0; i < fields.length; i++) {
                fields[i].value = '';
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
@endsection
