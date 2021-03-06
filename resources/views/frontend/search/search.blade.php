@extends('frontend.master')
@section('content')
    <div class="container" style="margin-top: 50px">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-4">
                <div class="product-items-area">
                    <div class="product-items">
                        <div class="product-header">
                            <p class="pull-left">Tìm thấy {{count($search)}} sản phẩm</p>
                        </div>
                        <div class="row">
                            <div id="product-slider" class="owl-carousel">

                                @foreach($search as $product)
                                    <div class="col-md-4">
                                        <div class="single-product">
                                            <div class="single-product-img">
                                                @if($product->quantity ==0)
                                                    <span style="background: #f13b43;padding: 3px 8px;font-size: 15px;position: absolute;right: 0;color: #fff;">Hết hàng</span>
                                                @endif
                                                @if($product->sale >0)
                                                    <span style="background: #3eb3f1;padding: 3px 8px;font-size: 15px;position: absolute;left: 0;color: #fff;">Sale {{$product->sale}} % </span>
                                                @endif
                                                <a href="{{route('showDetail',$product->id)}}"><img class="primary-img"
                                                                                                    src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}"></a>

                                            </div>
                                            <div class="single-product-content">
                                                <div class="product-content-left">
                                                    <h2><a href="{{route('product-detail',$product->id)}}">MUA HÀNG</a>
                                                    </h2>
                                                    <p>{{$product->product_name}}</p>
                                                </div>
                                                <div style="margin-top: 18px" class="product-content-right pull-right">
                                                    <p>
                                                        <del>{{number_format($product->price)}} vnđ</del>
                                                        &nbsp; {{number_format($product->getPrice())}} vnđ
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
