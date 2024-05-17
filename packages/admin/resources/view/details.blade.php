
@extends('admin::layouts.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox invoice">

        <table class="table table-striped no-margin table-invoice">
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Image Product</th>
                    <th>Name Product</th>
                    <th>Quantity</th>
                    <th class="text-right">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($result as $row) {
                    $total += $row->quantity * $row->price;
                ?>
                <tr>
                    <td>{{ $row->order_id }}</td>
                    <td><img style="width: 80px" src="{{ asset('image/product/' . $row->ThumbImage) }}" alt=""></td>
                    <td>{{ $row->product_name }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>{{ $row->price }}</td>
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
                    <td class="font-bold font-18">TOTAL:</td>
                    <td class="font-bold font-18">    <?php if ($total > 0) : ?>  <p>Total: ${{ number_format($total, 2) }}</p>  <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            {{-- <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button> --}}
        </div>
    </div>

</div>

@endsection
