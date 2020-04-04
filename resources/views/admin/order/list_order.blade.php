@extends('admin.layouts.index')
@section('content')
    <div class="view-list-order">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>

                <th>Customer name</th>
                <th>Status</th>
                <th>Total</th>
                <th>Xem</th>
                <th>Add new</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->customer->first_name ." ".$order->customer->last_name}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->total}},000 vnđ</td>
                    <td><a href="{{route('chi-tiet-don-hang',$order->id)}}" class="btn btn-primary">Xem</a></td>
                    <td>

                        <a onclick="return confirm('Bạn có muốn xóa không?')"
                           href="{{route('xoa-don-hang',$order->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
