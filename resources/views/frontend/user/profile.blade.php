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
{{--<div class="container">--}}
{{--    @if(Auth::check())--}}
{{--    <div class="row">--}}
{{--        <h2 class="text-danger">Thông tin tài khoản</h2>--}}
{{--        @if(session('sua'))--}}
{{--            <div style="color: #ff151c;" class="well">--}}
{{--                @if(session('sua'))--}}
{{--                    {{session('sua')}}--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <table class="table table-bordered success">--}}
{{--            <thead>--}}
{{--            <tr >--}}
{{--                <th class="info" >Ảnh đại diện</th>--}}
{{--                <td><img style="width: 100px"  class="product-image-intro"--}}
{{--                         src="{{ asset('/'.auth()->user()->avatar)}}"></td>--}}
{{--            </tr>--}}
{{--            <tr >--}}
{{--                <th class="info" >Tên</th>--}}
{{--                <td>{{Auth::user()->name}}</td>--}}
{{--            </tr>--}}
{{--            <tr >--}}
{{--                <th class="info">Tên đầy đủ</th>--}}
{{--                <td>{{Auth::user()->full_name}}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th class="info">Email</th>--}}
{{--                <td>{{Auth::user()->email}}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th class="info">Số điện thoại</th>--}}
{{--                <td>{{Auth::user()->phone}}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th class="info">Giới tính</th>--}}
{{--                <td>{{Auth::user()->gender = 1? 'Nam' : 'Nữ'}}</td>--}}
{{--            </tr>--}}

{{--            <tr>--}}
{{--                <th class="info">Ghi chú</th>--}}
{{--                <td>{{Auth::user()->note}}</td>--}}
{{--            </tr>--}}
{{--            </thead>--}}

{{--        </table>--}}
{{--        <a href="{{route('edit-profile',Auth::user()->id)}}" class="btn btn-primary pull-right">Sửa tài khoản</a>--}}
{{--    </div>--}}

{{--        @endif--}}
{{--</div>--}}
<div class="container">
    <div class="row">
        <div class=" col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <img class="img-circle img-responsive" src="{{ asset('/'.auth()->user()->avatar)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <div itemscope="" itemtype="http://schema.org/Person">
                                        <h2> <span itemprop="name">Tên: {{Auth::user()->name}}</span></h2>
                                        <p itemprop="jobTitle">Tên đầy đủ: {{Auth::user()->full_name}}</p>
                                        <p itemprop="email"><i class="fa fa-envelope"></i> Email: {{Auth::user()->email}}</p>
                                        <p><span itemprop="affiliation">Giới tính: {{Auth::user()->gender = 1? 'Nam' : 'Nữ'}}</span></p>
                                        <p><span itemprop="affiliation">Số điện thoại: {{Auth::user()->phone}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div id="social-links" class=" col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="github" class="btn btn-social btn-block btn-github" target="_BLANK" href="{{route('edit-profile',Auth::user()->id)}}">
                                        <i class="fa fa-edit"></i> Sửa thông tin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
