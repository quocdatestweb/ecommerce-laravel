@extends('products::layouts.app')
@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="section-title">
                <h3 class="title">LỊCH SỬ MUA HÀNG</h3>
                <br>
          
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã HĐ</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Tổng Giá</th>
                            <th  class="text-center">Xem chi tiết</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($result as $row)
                        @php
                            $i = $i+1;
                        @endphp
                            <tr>
                                <td>{{ $i}}</td>
                                <td>{{ $row->order_number }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone_number }}</td>
                                <td>{{ $row->address }}</td>
                                <td>
                                    @php
                                    $p =  $row->total_price ;
                                    $prices = number_format($p, 0, ',', '.') . '₫';
                                    @endphp
                                      {{ $prices }} 
                                    </td>                       

                                <td class="text-center"><a class="btn btn-sm btn-success" href="{{ route('user.viewsdetail', ['id' => $row->order_id]) }}">Xem</a></td>
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
    </div>
@endsection
