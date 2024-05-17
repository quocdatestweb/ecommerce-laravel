
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
                            <th>Order ID</th>
                            <th>Order Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>View</th>

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
                                <td>{{ $row->total_price }}</td>
                                <td><a class="btn btn-sm btn-success" href="{{ route('admin.viewdetail', ['id' => $row->order_id]) }}">Xem</a></td>
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
