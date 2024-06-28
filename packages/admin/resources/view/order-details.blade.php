
@extends('admin::layouts.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Thống kê đơn hàng</div>
        </div>
        <div class="ibox-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thời gian</th>
                            <th>Mã hóa đơn</th>
                            <th>Tên khách hàng</th>
                            <th>Số lượng </th>
                            {{-- <th>SĐT</th>
                            <th>Địa chỉ</th> --}}
                            <th>Trạng thái</th>
                            <th>Tổng giá</th>
                            <th>Xem </th>

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
                                <td>{{ date('d/m/Y H:m:s', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->order_number }}</td>
                                <td>{{ $row->name }}</td>
                                <td class="text-center">{{ $row->total_products }}</td>
                                {{-- <td>{{ $row->phone_number }}</td>
                                <td>{{ $row->address }}</td> --}}
                                @php
                                $price = $row->total_price  ;
                                $prices = number_format($price, 0, ',', '.') . '₫';
                                @endphp
                                <td>
                                    <span class="badge badge-{{ $row->total_products != '1' ? 'danger' : 'success' }}">{{ $row->total_products != '1' ? 'Giao dịch thất bại': 'Giao dịch thành công'}}</span>
                                </td>
                                <td>{{ $prices }}</td>
                                <td>
                                    <div class="btn-group m-b-10">
                                    <a class="m-r-5" href="{{ route('admin.viewdetail', ['id' => $row->order_id]) }}"><i class="fa-solid fa-eye text-secondary"></i></a>
                                    <form id="deleteForm" action="{{ route('admin.destroy_order', ['id' => $row->order_id]) }}"
                                        method="post">
                                        @csrf
                                        <a type="submit" data-toggle="tooltip" data-original-title="Delete"
                                            onclick="confirmDelete(event)"><i class="fa fa-trash font-14 text-secondary"></i></a>
                                    </form>
                                    </div>
                                
                                </td>
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
