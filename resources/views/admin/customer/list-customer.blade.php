@extends('admin.layouts.index')
@section('content')
    <div class="view-list-product">
        <b><h3>Danh sách khách hàng</h3></b>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cus as $item)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td>{{$item->first_name.' '. $item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone_number}}</td>
                    <th nowrap="">
                        <a onclick="return confirm('Bạn có muốn xóa không?')"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <li style="text-align: center; list-style: none">
            {{ $cus->links() }}
        </li>
    </div>
@endsection
