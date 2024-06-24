@extends('products::layouts.app')
@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="page-content fade-in-up">
                <div class="ibox invoice">
                    <div class="section-title">
                        <h3 class="title">CHI TIẾT HÓA ĐƠN MUA HÀNG</h3>
                        <br>
                    <table class="table table-striped no-margin table-invoice">
                        <thead>
                            <tr>
                            <th>ID Đơn Hàng</th>
                            <th class="text-center">Hình Ảnh Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                                $total += $row->quantity * $row->price;
                                
                            ?>
                               @php
                               $ps = $total ;
                               $totals= number_format($ps, 0, ',', '.') . '₫';
                               @endphp
                               
                            <tr>
                                <td>
                                    <a href="{{ route('products.show', ['id' =>$row->product_id]) }}">
                                        {{ $row->order_id }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('products.show', ['id' =>$row->product_id]) }}">
                                        <img style="width: 80px" src="{{ asset('image/product/' . $row->ThumbImage) }}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('products.show', ['id' =>$row->product_id]) }}">
                                    {{ $row->product_name }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $row->quantity }}</td>
                                <td class="text-center">
                                    @php
                                    $p =  $row->price ;
                                    $prices = number_format($p, 0, ',', '.') . '₫';
                                    @endphp
                                      {{ $prices }}                                
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-right">
                                <td class="font-bold font-18"><b>TOTAL:</b></td>
                                <td class="font-bold font-18">   <b> <?php if ($total > 0) : ?>  <p>Total: {{ $totals }}</p>  <?php endif; ?></b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        {{-- <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button> --}}
                    </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
