@extends('admin::layouts.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Thống kê sản phẩm</div>
        </div>
        <div class="ibox-body">
         
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Ảnh</th>
                            <th>Sản phẩm trúng thưởng</th>
                            <th>Ngày giờ trúng thưởng</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($winners as $winner)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $winner->user->name }}
                                <br>
                                {{ $winner->user->email }}
                            </td>
                            <td>
                                <img src="{{  $winner->image_url }}" alt="" srcset="" width="50px">
                            </td>
                            <td>
                                {{ $winner->gift_text }}
                            </td>
                            <td>
                                {{ $winner->created_at}}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $winners->links('admin::custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
