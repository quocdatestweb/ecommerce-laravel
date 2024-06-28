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
                            <td>
                                {{-- <span class="badge badge-{{ 
                                    $prize->quantity == '0' ? 'warning' : 'primary'
                                }}">
                                    {{ 
                                        $prize->quantity == '0' ? 'Hết ' : 'Còn'
                                    }}
                                </span>    --}}
                                <span class="badge badge-{{ $prize->status == 'active' ? 'success' : 'secondary' }}">{{ $prize->status == 'active' ? 'Hiện' : 'Ẩn' }}</span>
                            </td>
                            <td>
                                <div class="btn-group m-b-10">
                                    <form action="{{ route('products.edit', ['id' => $prize->id]) }}" method="get">
                                        @csrf
                                        <button style=" background-color: transparent; border: none;" type="submit" class="m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="fa fa-pencil font-14 text-secondary"></i>
                                        </button >
                                    </form>
                                    <form id="deleteForm" action="{{ route('products.destroy', ['id' => $prize->id]) }}"
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
                    {{ $prizer->links('admin::custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
