@extends('admin.layouts.index')
@section('content')
    @php
        $list_order_status=[
            "Đang chờ xử lý",
            "Đang xử lý",
            "Đã xử lý",
            "Đã hủy",
        ]
    @endphp
    <div class="view-order-detail">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <form action="{{route('post-edit-order',$order->id)}}" method="post">
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
                        <select class="form-control" name="status">
                            @foreach($list_order_status as $status)
                                <option
                                    <?php echo $status == $order->status ? '  selected ' : '' ?> value="{{$status}}">{{$status}}</option>
                            @endforeach
                        </select>
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
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@endsection
