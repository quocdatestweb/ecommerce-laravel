@extends('admin::layouts.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Thống kê bài viết</div>
        </div>
        <div class="ibox-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tiêu đề bài viết</th>
                            <th>Date time</th>
                            <th>Mô tả</th>
                            <th>Thể loại</th>
                            <th>Tác giả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)

                        <tr>
                            <td>
                                <div class="product-img">
                                    <img style="width: 100px" src="{{ url('image/post/' . $post->thumb_image) }}"
                                        alt="">
                                </div>
                            </td>
                            <td>{{ $post->name}}</td>
                            <td>{{ $post->created_at}}</td>
                            <td> {{ $post->description}}</td>
                            <td> {{  $post->category->name}}</td>
                            <td> {{  $post->author_type}}</td>
                            <td>

                                <div class="btn-group m-b-10">
                                    <form id="deleteForm" action="{{ route('posts.destroy', ['id' => $post->id]) }}"
                                        method="post">
                                        @csrf

                                        <button type="submit" class="btn btn-sm bg-white"
                                            onclick="confirmDelete(event)"><i
                                                class="fa fa-trash text-danger"></i></button>
                                    </form>
                                    <form action="{{ route('posts.edit', ['id' => $post->id]) }}" method="get">
                                        @csrf

                                        <button type="submit" class="btn btn-sm bg-white"><i
                                                class="fa fa-pencil text-warning bg-white"></i></button>
                                    </form>
                                    <a href="{{ route('showpost', ['id' => $post->id]) }}"
                                        class="btn btn-sm bg-white"><i class="fa fa-eye text-success"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $posts->links('admin::custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
