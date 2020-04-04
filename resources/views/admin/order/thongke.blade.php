@extends('admin.layouts.index')
@section('title_page','danh sách order')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4 style="line-height: 36px; padding-left: 10px;">Danh sách order</h4>
                </div>
                <div class="grid-body ">
                    @if (Session::has('thongbao'))
                        <div class="alert alert-success">
                            {{ Session::get('thongbao') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên sản phẩm bán</th>
                            <th class="text-center">Sản phẩm đã bán tháng</th>
                            <th class="text-center">Số lượng đã bán</th>
                            <th class="text-center">Số lượng còn lại</th>
                            <th class="text-center">Tổng tiền bán được</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_detail as $order)
                            <tr class="text-center" style="height: 60px;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{date_format(date_create($order->created_at),"m/yy")}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->quantity-$order->total}}</td>
                                <td>{{number_format($order->money)}},000.VND</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <a class="btn btn-warning" href="{{ route('export') }}">Xuất file</a>
                </div>
            </div>
        </div>
    </div>
    @if(empty($order))
        {{$order->link}}
    @endif
@endsection
