@extends('frontend.master')
@section('content')
    <!-- Product Item AREA -->
    <div class="product-item-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="product-item-categori">
                        <div class="product-type">
                            <h2>List Product</h2>
                            <ul>
                                @foreach($list_sub_category as $category)
                                    <li class="list-group-item"><a
                                            href="{{route('danh-muc',$category->id)}}">{{$category->category_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div class="product-item-list">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="product-item-heading">
                                    <div class="item-heading-title">
                                        <h2>ÁO BÓNG ĐÁ</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4">
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="{{route('showDetail',$product->id)}}"><img class="primary-img"
                                                                                                src="{{ asset('/'.$product->product_image_intro)}}"></a>
                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-content-left">
                                                <h2><a style="font-weight: bold"
                                                       href="{{route('product-detail',$product->id)}}">MUA
                                                        HÀNG</a></h2>
                                                <p>{{$product->product_name}}</p>
                                            </div>
                                            <div style="font-size: medium" class="product-content-right pull-right">
                                                <p>{{$product->price}} đ</p>
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
    <li style="text-align: center; list-style: none">
        {{ $products->links() }}
    </li>
@endsection
