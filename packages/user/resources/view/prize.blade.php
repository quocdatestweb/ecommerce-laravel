@extends('products::layouts.app')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">DANH SÁCH TRÚNG THƯỞNG </h3>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>                             
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                        </thead>
                        <tbody>
                            @foreach ($result as $prizes)
    
                            <tr>
                                <td>
                                    <img style="width: 50px" src="{{ $prizes->image_url }}"
                                    alt="">
                                </td>
                                <td>{{ $prizes->gift_text }}</td>
                                <td>
                                    <span class="badge" style="{{ 
                                        $prizes->status == 'unactive' ? 'background-color: badge;' :
                                        ($prizes->status == 'inactive' ? 'background-color: red;' : 'background-color: green;')
                                    }}">
                                        {{ 
                                            $prizes->status == 'unactive' ? 'Hết hàng' :
                                            ($prizes->status == 'inactive' ? 'Chưa trao' : 'Đã trao')
                                        }}
                                    </span>                        
                                </td>
                                <td>{{ $prizes->created_at }}</td>
                            </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end align-items-center">
                        {{ $result->links('admin::custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
  
@endsection
