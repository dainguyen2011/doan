@extends('admin.layouts.index')
@section('content')
    <b><h3>Thay đổi trạng thái đơn hàng</h3></b>
    <div class="view-order-detail">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <form action="{{route('post-edit-order',$order->id)}}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>{{$order->id}}</th>
                </tr>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>{{$order->customer->first_name ." ".$order->customer->last_name}}</th>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <th>{{number_format($order->total)}} vnđ</th>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <th>
                        @if($order->status_1 != 2 && $order->status_1 != 3)
                            <a href="{{route('change-status', $order->id)}}">
                                <span
                                    class="label {{ $order->getStatus($order->status_1)['class'] }}">{{ $order->getStatus($order->status_1)['name'] }}</span>
                            </a>
                        @else
                            <span
                                class="label {{ $order->getStatus($order->status_1)['class'] }}">{{ $order->getStatus($order->status_1)['name'] }}</span>
                        @endif
                    </th>
                </tr>
            </table>
            <h3>Danh sách sản phẩm</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderProducts as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{number_format($product->product_price)}} vnđ</td>
                        <td>{{$product->product_qty}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{route('list-don-hang')}}" type="submit"><i class="fa fa-backward"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
