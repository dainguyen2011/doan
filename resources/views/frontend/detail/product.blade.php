@extends('frontend.master')
@section('content')
    <br>
    <div class="product-item-area">
        <div class="container">
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
                                                    src="{{ asset('/'.$product->product_image_intro)}}"></a></li>
                                        <br>
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
                                        <h2>Available Options:</h2>
                                        <p class="quality">Số lượng</p>
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" name="quality"
                                                   min="1" value="1" style="padding: 0px;width: 50px;" step="1">
                                        </div>
                                        <div class="size-option fix">
                                            <p>Size:</p>
                                            <select name="product_size">
                                                <option value="Choose an option">Chọn size</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                            </select>
                                        </div>
                                        <button style="margin-top: 10px" type="submit" class="btn btn-primary"><i
                                                class="fas fa-cart-plus"></i> Thêm hàng
                                        </button>
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
        </div>
    </div>

    <div id="fb-root"></div>
    <script language="javascript" async defer crossorigin="anonymous"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=232587937746885&autoLogAppEvents=1">

        CKEDITOR.replace('txt');

    </script>
    <script>
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
