
@extends('admin::layouts.app')
@section('content')
<style>
    .invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>
<div class="page-content fade-in-up">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
               <span class="pull-right hidden-print">
               {{-- <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a> --}}
               <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
               </span>
                Ecommerce, Inc
            </div>

            <?php
            $total = 0;
            $to = 0;
            foreach ($result as $row) {
                $total += $row->quantity * $row->price;
                $to +=1;
                $totals = number_format($total, 0, ',', '.') . '₫';
                $name = $row->name;
                $address = $row->address;
                $phone = $row->phone_number;

            ?>

            <?php
            }
            ?>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
               <div class="invoice-from">
                  <small>Từ</small>
                  <address class="m-t-5 m-b-5">
                     <strong class="text-inverse">Ecommerce, Inc.</strong><br>
                     19 Nguyễn Hữu Thọ, phường Tân Phong, Quận 7, TP HCM
                     <br>
                     SĐT: 096 1414 8516<br>
                  </address>
               </div>
               <div class="invoice-to">
                  <small>đến</small>
                  <address class="m-t-5 m-b-5">
                     <strong class="text-inverse">{{ $name }}</strong><br>
                        {{ $address }}
                        <br>
                     SĐT: {{ $phone }}<br>
                  </address>
               </div>
               <div class="invoice-date">
                  <small>Thông tin chi tiết hóa đơn</small>
                  <div class="date text-inverse m-t-5">{{ $row->created_at }}</div>
                  <div class="invoice-detail">
                     #{{ $row->order_number }}<br>
                     <span class="badge badge-{{ $to != 1 ? 'danger' : 'success' }}">{{ $to != 1 ? 'Giao dịch thất bại': 'Giao dịch thành công'}}</span>
                    </div>
               </div>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
               <!-- begin table-responsive -->
               <div class="table-responsive">
                  <table class="table table-invoice">
                     <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hỉnh ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th class="text-center">Giá</th>
                        </tr>
                        {{-- <tr>
                           <th>TASK DESCRIPTION</th>
                           <th class="text-center" width="10%">RATE</th>
                           <th class="text-center" width="10%">HOURS</th>
                           <th class="text-right" width="20%">LINE TOTAL</th>
                        </tr> --}}
                     </thead>
                     <tbody>
                        <?php
                        $total =0;
                        $i= 0;

                        foreach ($result as $row) {
                            $total += $row->quantity * $row->price;
                            $totals = number_format($total, 0, ',', '.') . '₫';
                            $i = $i+1;

                        ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td><img style="width: 40px; height: auto;" src="{{ asset('image/product/' . $row->ThumbImage) }}" alt=""></td>
                            <td>{{ $row->product_name }}</td>
                            <td>{{ $row->quantity }}</td>
                            @php
                            $price = $row->price  ;
                            $prices = number_format($price, 0, ',', '.') . '₫';
                            @endphp
                            <td>{{ $prices }}</td>
                        </tr>
                        <?php
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
               <!-- end table-responsive -->
               <!-- begin invoice-price -->
               <div class="invoice-price">
                  <div class="invoice-price-left">
                     {{-- <div class="invoice-price-row">
                        <div class="sub-price">
                           <small>SUBTOTAL</small>
                           <span class="text-inverse">$4,500.00</span>
                        </div>
                        <div class="sub-price">
                           <i class="fa fa-plus text-muted"></i>
                        </div>
                        <div class="sub-price">
                           <small>PAYPAL FEE (5.4%)</small>
                           <span class="text-inverse">$108.00</span>
                        </div>
                     </div> --}}
                  </div>
                  <div class="invoice-price-right">
                    <?php if ($total > 0) : ?> <small>TỔNG CỘNG</small> <span class="f-w-600">{{ $totals}}</span>   <?php endif; ?>
                     
                  </div>
               </div>
               <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
            <div class="invoice-note">
                * Thanh toán tất cả các séc cho Ecommerce<br>
                * Thanh toán phải được thực hiện trong vòng 30 ngày<br>
                * Nếu bạn có bất kỳ câu hỏi nào liên quan đến hóa đơn này, hãy liên hệ với số điện thoại 096 141 8516
                </div>
            <!-- end invoice-note -->
            <!-- begin invoice-footer -->
            <div class="invoice-footer">
               <p class="text-center m-b-5 f-w-600">
                  XIN CHÂN THÀNH CẢM ƠN!
               </p>
               <p class="text-center">
                  <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> ecomerce2024.com</span>
                  <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> SĐT: 096 141 8516</span>
                  <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> ecomerce2024@gmail.com</span>
               </p>
            </div>
            <!-- end invoice-footer -->
         </div>
        <div class="text-right">
            {{-- <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button> --}}
        </div>
    </div>


@endsection
