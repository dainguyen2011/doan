@extends('admin.layouts.index')
@section('content')
    <div class="view-list-order">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã sản phẩm</th>

                <th>Tên khách hàng</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Xem</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->customer->first_name ." ".$order->customer->last_name}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{number_format($order->total)}} vnđ</td>
                    <td><a href="{{route('chi-tiet-don-hang',$order->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                    <td>

                        <a onclick="return confirm('Bạn có muốn xóa không?')"
                           href="{{route('xoa-don-hang',$order->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
