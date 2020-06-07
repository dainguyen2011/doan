@extends('frontend.master')

@section('content')
    <div class="view-list-product">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group" style="margin-top: 15px">
                        @foreach($list_sub_category as $category)
                            <li class="list-group-item" ><a href="{{route('danh-muc',$category->id)}}">{{$category->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div class="item-aoclb">
                        <div class="wrapper-title-item-aoclb">

                        </div>
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4">
                                        <div class="single-product" style="margin-top: 37px;margin-bottom: 16px;">
                                            <div class="single-product-img">
                                                @if($product->quantity ==0)
                                                    <span style="background: #f13b43;padding: 3px 8px;font-size: 15px;position: absolute;right: 0;color: #fff;">Hết hàng</span>
                                                @endif
                                                @if($product->sale >0)
                                                    <span style="background: #3eb3f1;padding: 3px 8px;font-size: 15px;position: absolute;left: 0;color: #fff;">Sale {{$product->sale}} % </span>
                                                @endif
                                                <a href="{{route('showDetail',$product->id)}}"><img
                                                        class="primary-img myImage"
                                                        src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}"></a>
                                            </div>
                                            <div class="single-product-content">
                                            <div class="product-content-left">
                                                <h2><a style="font-weight: bold"
                                                       href="{{route('product-detail',$product->id)}}">MUA
                                                        HÀNG</a></h2>
                                                <p>{{$product->product_name}}</p>
                                            </div>
                                            <div style="font-size: medium"
                                                 class="product-content-right pull-right">
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
@endsection
