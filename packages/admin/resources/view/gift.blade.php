@extends('admin::layouts.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Danh sách quà tặng</div>
        </div>
        <div class="ibox-body">
        
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên giải thưởng</th>
                            <th>Tỉ lệ trúng</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prizer as $prize)

                        <tr>
                            <td>
                                <img style="width: 50px" src="{{ $prize->description }}"
                                alt="">
                            </td>
                            <td>{{ $prize->name }}</td>
                            <td>{{ $prize->winning_rate *100}}%</td>
                            <td>{{ $prize->quantity }}</td>
                            <td>
                                <span class="badge badge-{{ $prize->status == 'active' ? 'success' : 'secondary' }}">{{ $prize->status == 'active' ? 'Hiện' : 'Ẩn' }}</span>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $prizer->links('admin::custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
