@extends('frontend.master')
@section('content')
{{--    <div class="view-list-order"style="align-content: center;text-align: center">--}}
{{--        @if(Auth::check())--}}
{{--            <h3>Thông tin người dùng</h3>--}}
{{--            <ul  style="text-align: center; border: 1px solid black">--}}
{{--                <li>Tên:{{Auth::user()->name}}</li>--}}

{{--                <li>Tên đầy đủ:{{Auth::user()->full_name}}</li>--}}
{{--                <li>Email:{{Auth::user()->email}}</li>--}}
{{--                <li>Số điện thoại:{{Auth::user()->phone}}</li>--}}
{{--                <li>Quyền:{{Auth::user()->type}}</li>--}}
{{--                <li>Ghi chú:{{Auth::user()->note}}</li>--}}


{{--            </ul>--}}
{{--            @endif--}}
{{--    </div>--}}
<div class="container">
    @if(Auth::check())
    <div class="row">
        <h2 class="text-danger">Thông tin tài khoản</h2>
        @if(session('sua'))
            <div style="color: #ff151c;" class="well">
                @if(session('sua'))
                    {{session('sua')}}
                @endif
            </div>
        @endif
        <table class="table table-bordered success">
            <thead>
            <tr >
                <th class="info" >Name</th>
                <td>{{Auth::user()->name}}</td>
            </tr>
            <tr >
                <th class="info">Full Name</th>
                <td>{{Auth::user()->full_name}}</td>
            </tr>
            <tr>
                <th class="info">Email</th>
                <td>{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <th class="info">Phone</th>
                <td>{{Auth::user()->phone}}</td>
            </tr>
            <tr>
                <th class="info">Gender</th>
                <td>{{Auth::user()->gender}}</td>
            </tr>

            <tr>
                <th class="info">Note</th>
                <td>{{Auth::user()->note}}</td>
            </tr>
            </thead>

        </table>
        <a href="{{route('edit-profile',Auth::user()->id)}}" class="btn btn-primary pull-right">Sửa tài khoản</a>
    </div>

        @endif
</div>
@endsection
