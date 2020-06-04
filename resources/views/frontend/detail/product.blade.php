@extends('frontend.master')
@section('content')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <br>
    <div class="product-item-area">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-8">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="product-item-tab">
                                <!-- Tab panes -->
                                <!-- Nav tabs -->
                                <div class="single-tab-img">
                                    <div class="nav nav-tabs" role="tablist">

                                        <li role="presentation" class="active"><a href="#img-one" role="tab"
                                                                                  data-toggle="tab"><img
                                                    style="width: 100%" class="product-image-intro"
                                                    src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}"></a></li>
                                        <br>
                                        <div class="row">
                                        @if($product->gallery)
                                            <li role="presentation"><a href="#img-two" role="tab" data-toggle="tab"><img
                                                        style="width: 20%"
                                                        src="{{ asset('/'.$product->gallery->image)}}"
                                                        alt="tab-img"></a></li>
                                        @endif
                                        @if($product->gallery)
                                            <li role="presentation" class="tab-last-li"><a href="#img-three" role="tab"
                                                                                           data-toggle="tab"><img
                                                        style="width: 20%"
                                                        src="{{ asset('/'.$product->gallery->image1)}}"
                                                        alt="tab-img"></a></li>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5">
                            <form action="{{route('add-to-cart',$product->id)}}" method="post">
                                <div class="product-tab-content">
                                    <div class="product-tab-header">
                                        <h3>{{$product->product_name}}</h3>
                                        <div class="prices">
                                            <span class="prices">{{number_format($product->getPrice())}}</span><span
                                                class="currency"> vnđ</span>
                                        </div>
                                        <div class="prices">
                                            <i class="fas fa-eye"></i>
                                            <span class="prices">{{number_format($product->views)}} <sup>Luợt xem</sup></span>
                                        </div>
                                    </div>
                                    <div class="available-option">
                                        <h2>Còn : {{$product->quantity}} sản phẩm</h2>
                                        <p class="quality">Số lượng</p>
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" name="quality"
                                                   min="1" value="1" style="padding: 0px;width: 50px;" step="1">
                                        </div>
                                        <div class="size-option fix">
                                            <p>Size:</p>
                                            <select name="product_size">
                                                <option value="">Chọn size</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                            </select>
                                        </div>
                                        @if($product->quantity >0)
                                            <button style="margin-top: 10px" type="submit" class="btn btn-primary"><i
                                                    class="fas fa-cart-plus"></i> Thêm hàng
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="description-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#description" role="tab" data-toggle="tab">Mô tả sản phẩm</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        {!! $product->description !!}
                                    </div>
                                </div>

                                <hr>
                                <div class="comment-box-wrapper" style="font-size: 100px ">

                                    <h3>Các bình luận</h3>
                                    <div class="fb-comments"
                                         data-href="http://localhost:8000/showDetail/{{$product->id}}" data-width="1000"
                                         data-numposts="10"></div>


                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                @if(Auth::user())
                    <form action="{{route('review', $product->id)}}" method="post" id="#selected_rating">
                        @csrf
                        <div class="form-group" id="rating-ability-wrapper">
                            <div>
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
                            </div>
                            <label class="control-label" for="rating">
                                <h3 class="field-label-header">Đánh giá sản phẩm</h3><br>
                                <div class="col-xs-12 col-md-12 text-center">
                                    <h1 class="rating-num" style="color: red">
                                        {{($avg_stars)}} / 5 <i
                                            class="text-danger fa fa-star"></i>
                                    </h1>
                                    <div class="col-6">
                                        <div class="col-3">
                                            <div class="rating" style="width: 101%">
                                                @for($i = 1; $i <= $avg_stars; $i++)
                                                    <span class="float-right"><i
                                                            class="text-warning fa fa-star"></i></span>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <span class="glyphicon glyphicon-user"></span>{{$persons}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="field-label-info"></span>
                                <input type="hidden" id="selected_rating" name="selected_rating" value=" "
                                       required="required">
                            </label>
                            <h2 class="bold rating-header" style="">
                                <input type="text" name="rating" class="selected-rating number_rating" value="" hidden>
                            </h2>
                            @for($i = 1; $i <= 5; $i++)
                                <button name="rating" type="button" class="btnrating btn-default  btn-rating"
                                        data-attr="{{$i}}"
                                        id="rating-star-{{$i}}">
                                    <i class="fa fa-star" style="font-size: 11px" aria-hidden="true"></i>
                                </button>
                            @endfor
                            <span class="rsStar list_text"></span>
                            <div class="txt">
                            <textarea id="txt" class="form-control" required
                                      name="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 50%">Đánh giá</button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="row">
                <h3>{{$persons .' '}} đánh giá {{$product->product_name}}</h3>
                <div class="row">
                    @foreach($rating as $rate)
                        <div class="row" style="margin-top: 5%">
                            <div class="col-md-2">
                                <img
                                    src="{{asset('/'.$rate->users->avatar)}}"
                                    style="width: 126px;height: 137px;position: relative;border-radius: 100%;border: 6px solid #438eb9;margin-bottom: 16%;box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.1)"/>
                            </div>
                            <div class="col-md-2">
                                @php
                                    \Carbon\Carbon::setLocale('vi');
                                @endphp
                                <p>{{\Carbon\Carbon::parse($rate->created_at)->diffForHumans()}}</p>
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <a class="float-left"
                                       href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$rate->users->name}}</strong></a>
                                    @for($i = 1; $i <= $rate->rating; $i++)
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @endfor
                                </p>
                                <div class="clearfix"></div>
                                <p>{!! $rate->content !!}</p>
                            </div>
                        </div>

                    @endforeach
                    @if($persons >= 5)
                        <a href="{{route('list-rate', $product->id)}}" class="rate">Xem thêm đánh giá</a>
                    @endif
                </div>
            </div>

            <div class="product-items">
                <h2 class="product-header" style="text-align: center">Sản phẩm cùng loại</h2>
                <div class="row">
                    <div id="product-slider-women" class="owl-carousel">
                        @foreach($product_related as $product)
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

    <div id="fb-root"></div>
    <script language="javascript">

        CKEDITOR.replace('txt');

    </script>
    <script language="javascript" async defer crossorigin="anonymous"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=232587937746885&autoLogAppEvents=1">
        $(document).ready(function () {
            //-- Click on detail
            $("ul.menu-items > li").on("click", function () {
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click", function () {
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click", function () {
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)) {
                    if (parseInt(now) - 1 > 0) {
                        now--;
                    }
                    $(".section > div > input").val(now);
                } else {
                    $(".section > div > input").val("1");
                }
            })
            $(".btn-plus").on("click", function () {
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)) {
                    $(".section > div > input").val(parseInt(now) + 1);
                } else {
                    $(".section > div > input").val("1");
                }
            })
        })

    </script>
    <br>
@endsection
