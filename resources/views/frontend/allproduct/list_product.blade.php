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
                                                <a href="{{route('showDetail',$product->id)}}"><img
                                                        class="primary-img myImage"
                                                        src="{{ asset('/'.$product->product_image_intro)}}"></a>
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
