@extends('admin::layouts.app')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Thêm sản phẩm</div>
            </div>
            <div class="ibox-body">
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img id="previewImage"
                                        src="https://cdn2.iconfinder.com/data/icons/creative-icons-2/64/PACKAGING_DESIGN-1024.png"
                                        alt="product" width="110">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="thumbImage">Hình ảnh</label>
                                <div class="form-group">
                                    <input name="thumbImage" type="file" class="form-control" id="imageUpload"
                                        accept="image/*">
                                    <label class="custom-file-label" for="customFileLang"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01"
                                    required>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="author_id">Nhà sản xuất</label>
                                <select class="form-control" id="author_id" name="author_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name }}
                                        </option>
                                    @endforeach
                                    <!-- Include options for categories here -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="author_type">Đại diện</label>
                                <select class="form-control" id="author_type" name="author_type" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}"> {{ $user->name }}
                                        </option>
                                    @endforeach
                                    <!-- Include options for categories here -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryid">Thể loại</label>
                                <select class="form-control" id="categoryid" name="categoryid" required>
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
                        <label for="content">Nội dung</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
