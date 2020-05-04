@extends('admin.layouts.index')
@section('title_page','danh sách order')
@section('content')
{{--    <div class="row-fluid">--}}
{{--        <div class="span12">--}}
{{--            <div class="grid simple ">--}}
{{--                <div class="grid-title">--}}
{{--                    <h4 style="line-height: 36px; padding-left: 10px;">Danh sách order</h4>--}}
{{--                </div>--}}
{{--                <div class="grid-body ">--}}
{{--                    @if (Session::has('thongbao'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{ Session::get('thongbao') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <table class="table table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr class="text-center">--}}
{{--                            <th class="text-center">STT</th>--}}
{{--                            <th class="text-center">Tên sản phẩm bán</th>--}}
{{--                            <th class="text-center">Sản phẩm đã bán tháng</th>--}}
{{--                            <th class="text-center">Số lượng đã bán</th>--}}
{{--                            <th class="text-center">Số lượng còn lại</th>--}}
{{--                            <th class="text-center">Tổng tiền bán được</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($order_detail as $order)--}}
{{--                            <tr class="text-center" style="height: 60px;">--}}
{{--                                <td>{{$loop->iteration}}</td>--}}
{{--                                <td>{{$order->product_name}}</td>--}}
{{--                                <td>{{date_format(date_create($order->created_at),"m/yy")}}</td>--}}
{{--                                <td>{{$order->total}}</td>--}}
{{--                                <td>{{$order->quantity-$order->total}}</td>--}}
{{--                                <td>{{number_format($order->money)}},000.VND</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                        <a class="btn btn-warning" href="{{ route('export') }}">Xuất file</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if(empty($order))--}}
{{--        {{$order->link}}--}}
{{--    @endif--}}
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <h2>Thống kê đơn hàng</h2>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$product_count}}</h3>

                    <p>Tổng sản phẩm trong kho</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('danh-sach-san-pham') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{$order_count}}</h3>

                    <p>Số đơn chờ duyệt</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('list-don-hang') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$ordered_count}}</h3>

                    <p>Số đơn đã duyệt</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('danh-sach-san-pham') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$delayed_count}}</h3>

                    <p>Số đơn hủy duyệt</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('danh-sach-san-pham') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
    <div style="margin-top: 10%" class="panel panel-default">
        <div class="panel-heading" style="text-align: center">Đơn hàng mới</div>
        <div class="panel-body">
            <p>aaaaaa</p>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$loop->iteration}}</td>
                <th>{{$order->customer->first_name ." ".$order->customer->last_name}}</th>
                <th>{{date_format(date_create($order->created_at),"d/m/yy")}}</th>
                <th>{{$order->total}},000 vnđ</th>
            </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
