@extends('admin::layouts.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Thống kê sản phẩm</div>
        </div>
        <div class="ibox-body">
            {{-- <div class="row">
                <div class="col-md-10">
                    <div class="card-deck">
                        @foreach ($products as $product)
                        <div class="card">
                            <div class="btn-group m-b-10">
                                <form action="{{ route('products.edit', ['id' => $product->id]) }}" method="get">
                                    @csrf

                                    <button type="submit" class="btn btn-xs m-r-5  bg-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14 text-warning"></i></button>
                                </form>
                                <form id="deleteForm" action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                    method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-xs bg-white" data-toggle="tooltip" data-original-title="Delete"
                                        onclick="confirmDelete(event)"><i class="fa fa-trash font-14 text-danger"></i></button>
                                </form>
                            </div>
                            <img class="card-img-top" src="{{ url('image/product/' .$product->ThumbImage ) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->Name }}</h5>

                            </div>
                            <div class="card-footer">
                                <a class="text-info"><i class="fa fa-star"></i> {{ $product->Price }}</a>
                                <span class="pull-right text-muted font-13">{{ $product->category->name }}</span>
                            </div>

                        </div>
                        @endforeach
                        <div class="d-flex justify-content-end align-items-center">
                            {{ $products->links('admin::custom-pagination') }}
                        </div>

                    </div>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá cả</th>
                            <th>Thể loại</th>
                            <th>Đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)

                        <tr>
                            <td>
                                <img style="width: 50px" src="{{ url('image/product/' .$product->ThumbImage ) }}"
                                alt="">
                            </td>
                            <td>{{ $product->Name }}</td>
                            <td>${{ $product->Price }}</td>
                            <td> {{ $product->category->name }}</td>
                            <td>  @php
                                $k = rand(1, 5);
                                // Alternatively, you can use: $k = Str::random();
                            @endphp
                            @for ($i = 1; $i <= $k; $i++)
                                <i class="fa fa-star text-warning"></i>
                            @endfor</td>
                            <td>

                                <div class="btn-group m-b-10">
                                    <form action="{{ route('products.edit', ['id' => $product->id]) }}" method="get">
                                        @csrf

                                        <button type="submit" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14 text-warning"></i></button>
                                    </form>
                                    <form id="deleteForm" action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                        method="post">
                                        @csrf

                                        <button type="submit" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"
                                            onclick="confirmDelete(event)"><i class="fa fa-trash font-14 text-danger"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $products->links('admin::custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
