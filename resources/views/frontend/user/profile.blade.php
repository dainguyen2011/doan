@extends('frontend.master')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('warning') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class=" col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div
                                        class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                        <img class="img-circle img-responsive"
                                             src="{{ asset('/'.auth()->user()->avatar)}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div
                                        class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                        <div itemscope="" itemtype="http://schema.org/Person">
                                            <h2><span itemprop="name">Tên: {{Auth::user()->name}}</span></h2>
                                            <p itemprop="jobTitle">Tên đầy đủ: {{Auth::user()->full_name}}</p>
                                            <p itemprop="email"><i class="fa fa-envelope"></i>
                                                Email: {{Auth::user()->email}}</p>
                                            <p><span
                                                    itemprop="affiliation">Giới tính: {{Auth::user()->gender = 1? 'Nam' : 'Nữ'}}</span>
                                            </p>
                                            <p><span
                                                    itemprop="affiliation">Số điện thoại: {{Auth::user()->phone}}</span>
                                            </p>
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
                                        <a title="github" class="btn btn-social btn-block btn-github"
                                           href="{{route('edit-profile',Auth::user()->id)}}">
                                            Sửa thông tin
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
