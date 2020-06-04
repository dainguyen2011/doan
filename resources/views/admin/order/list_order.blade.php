@extends('admin.layouts.index')
@section('content')
    <b><h3>Danh sách đơn hàng</h3></b>
    <div class="view-list-order">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Số thứ tự</th>

                <th>Tên khách hàng</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Đã thanh toán</th>
                <th>Xem</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->customer->first_name ." ".$order->customer->last_name}}</td>
                    @if($order->status_1 == 0 )
                        <td>Đang chờ xử lý</td>
                    @endif
                    @if($order->status_1 == 1 )
                        <td>Đang xử lý</td>
                    @endif
                    @if($order->status_1 == 2 )
                        <td>Đã xử lý</td>
                    @endif
                    {{--                    <td> {{ $order->getStatus($order->status_1)['name'] }}</td>--}}
                    <td>{{number_format($order->total)}} vnđ</td>
                    <td>{{number_format($order->paid)}} vnđ</td>
                    <td><a href="{{route('chi-tiet-don-hang',$order->id)}}" class="btn btn-primary"><i
                                class="fa fa-eye"></i></a></td>
                    <td>

                        <a onclick="return confirm('Bạn có muốn xóa không?')"
                           href="{{route('xoa-don-hang',$order->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <li style="text-align: center; list-style: none">
            {{ $orders->links() }}
        </li>
    </div>
@endsection
