@extends('frontend.master')
@section('content')
    <!-- SLIDESHOW -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="w3-content w3-display-container" style=".mySlides {display:none}">
        <img class="mySlides" src="upload\products\sl1.jpg" style="width:100%">
        <img class="mySlides" src="upload\products\sl2.jpg" style="width:100%">
        <img class="mySlides" src="upload\products\sl3.jpg" style="width:100%">
    </div>


    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds

        }
    </script>

    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-4">
                    <div class="product-items-area">
                        <div class="product-items">
                            <div class="dropdown">
                                <button style="margin-top: 10px;background-color: #5a5c69"
                                        class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Chọn sắp xếp sản phẩm
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                     style="background: #ffffff">
                                    <a class="dropdown-item" href="{{route('home', 'sx=DESC')}}">Giá từ cao đến thấp</a>
                                    <br>
                                    <a class="dropdown-item" href="{{route('home', 'sx=ASC')}}">Giá từ thấp đến cao</a>
                                </div>
                            </div>

                            <h2 class="product-header" style="text-align: center">ÁO CÂU LẠC BỘ</h2>
                            <div class="row">
                                <div id="product-slider" class="owl-carousel">
                                    @foreach($aoclb_products as $product)
                                        <div class="col-md-4">
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="{{route('showDetail',$product->id)}}"><img
                                                            class="primary-img"
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
                    <div class="product-items">
                        <h2 class="product-header" style="text-align: center">ÁO ĐỘI TUYỂN</h2>
                        <div class="row">
                            <div id="product-slider-women" class="owl-carousel">
                                @foreach($aodoituyen_products as $product)
                                    <div class="col-md-4">
                                        <div class="single-product">
                                            <div class="single-product-img">
                                                <a href="{{route('showDetail',$product->id)}}"><img class="primary-img"
                                                                                                    src="{{ asset('/'.$product->product_image_intro)}}"></a>
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
                <div class="arrivals-area single-add">
                    <a href="#"> <img style="height: 100px ;display: none"
                                      src="{{asset('assets/frontend/img/banner/banner.jpg')}}"
                                      alt="arrivals"> </a>
                </div>
                <div class="product-items">
                    <h2 class="product-header" style="text-align: center">ÁO KHÔNG LOGO</h2>
                    <div class="row">
                        <div id="product-slider-women" class="owl-carousel">
                            @foreach($aologo_products as $product)
                                <div class="col-md-4">
                                    <div class="single-product">
                                        <div class="single-product-img">
                                            <a href="{{route('showDetail',$product->id)}}"><img class="primary-img"
                                                                                                src="{{ asset('/'.$product->product_image_intro)}}"></a>

                                        </div>
                                        <div class="single-product-content">
                                            <div class="product-content-left">
                                                <h2><a href="{{route('product-detail',$product->id)}}">MUA HÀNG</a></h2>
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
@endsection
