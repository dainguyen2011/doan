@extends('admin.layouts.index')
@section('content')
    <div class="view-list-order">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Comment</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td style="width: 100px">{{$loop->iteration}}</td>
                    <td style="width: 100px">{{$comment->user->name}}</td>
                    <td style="width: 100px">{{$comment->product->product_name}}</td>
                    <td style="width: 1000px">{!! $comment->body !!}</td>
                    <td>
                        <a onclick="return confirm('bạn có muốn xóa không?')"
                           href="{{route('xoa-comment',$comment->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
