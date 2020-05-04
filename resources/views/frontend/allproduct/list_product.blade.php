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
                                <div class="col-md-3">
                                    <div class="clb-item">
                                        <div clb-item-content>
                                            <div class="wrapper-image">
                                                <img class="clb-image-intro" src="{{url('/')}}/{{$product->product_image_intro}}">
                                            </div>
                                            <h4 class="clb-name">{{$product->product_name}}</h4>
                                            <div class="prices">
                                                <span>
                                                    <del>{{number_format($product->price)}} vnđ</del>
                                                    &nbsp; {{number_format($product->getPrice())}} vnđ
                                                </span>
                                                <span class="currency"> đ</span>
                                            </div>
                                            <a href="{{route('product-detail',$product->id)}}" class="btn btn-primary btn-block"><i class="fas fa-search-plus"></i> Mua hàng</a>
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
