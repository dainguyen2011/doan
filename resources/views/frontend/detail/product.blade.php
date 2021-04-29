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
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}"/>
                                </div>
                                @if($product->gallery)
                                    <div class="tab-pane" id="pic-2"><img
                                            src="{{ asset('/'.$product->gallery->image)}}"/></div>
                                @endif
                                @if($product->gallery)
                                    <div class="tab-pane" id="pic-3"><img
                                            src="{{ asset('/'.$product->gallery->image1)}}"/></div>
                                @endif
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                            src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}"/></a>
                                </li>
                                @if($product->gallery)
                                    <li><a data-target="#pic-2" data-toggle="tab"><img
                                                src="{{ asset('/'.$product->gallery->image)}}"/></a></li>
                                @endif
                                @if($product->gallery)
                                    <li><a data-target="#pic-3" data-toggle="tab"><img
                                                src="{{ asset('/'.$product->gallery->image1)}}"/></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('add-to-cart',$product->id)}}" method="post">
                                <div class="product-tab-content">
                                    <div class="product-tab-header">
                                        <h3>{{$product->product_name}}</h3>
                                        <div class="prices">
                                            <b> Giá tiền: </b>
                                            <span class="prices">{{number_format($product->getPrice())}}</span><span
                                                class="currency"> vnđ</span>
                                        </div>
                                        <div class="prices">
                                            <b>Lượt xem: </b>
                                            <span class="prices">{{number_format($product->views)}}<i class="fas fa-eye"></i></span>
                                        </div>
                                        <div class="prices">
                                            <b>Thương hiệu: </b>
                                            <span class="prices">{{$product->brand}}</span>
                                        </div>
                                    </div>
                                    <div class="available-option">
                                        <div class="col-md-3">
                                            <b class="quality">Số lượng</b>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" name="quality"
                                                       min="1" value="1" style="padding: 0px;width: 50px;" step="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="available-option">
                                        <div class="col-md-3">
                                            <b>Size:</b>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="input-text" name="product_size">
                                                <option value="">Chọn size</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                            </select>
                                        </div>
                                        <span>(*bắt buộc chọn size)</span>
                                        <table style="margin-top: 20%" class="table">
                                            <thead class="thead-dark">
                                            <tr style="background-color: black; color: white">
                                                <th scope="col">Size</th>
                                                <th scope="col">Dài áo (cm)</th>
                                                <th scope="col">Ngang áo (cm)</th>
                                                <th scope="col">Chiều cao (cm)</th>
                                                <th scope="col">Cân nặng (kg)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">S</th>
                                                <td>73</td>
                                                <td>49</td>
                                                <td>163 - 170</td>
                                                <td>66 - 74</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">M</th>
                                                <td>76</td>
                                                <td>52</td>
                                                <td>168 - 175</td>
                                                <td>70 - 78</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">L</th>
                                                <td>78</td>
                                                <td>55</td>
                                                <td>175 - 180</td>
                                                <td>76 - 84</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">XL</th>
                                                <td>81</td>
                                                <td>57</td>
                                                <td>180 - 185</td>
                                                <td>80 - 88</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">XXL</th>
                                                <td>84</td>
                                                <td>80</td>
                                                <td>185 - 190</td>
                                                <td>84 - 92</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                    <div class="available-option">
                                        @if($product->quantity >0)
                                            <button type="submit" class="btn btn-primary"><i
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
                                        <a href="#description" role="tab" data-toggle="tab"><b>Mô tả sản phẩm</b></a>
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

                                    <div class="related-products-wrapper">
                                        <h2 class="related-products-title">Hỏi và đáp ({{$totalComment}} Bình luận)</h2>
{{--                                        <form action="{{route('comment',$product->id)}}" method="post" style="border:1px solid" multiple="">--}}
{{--                                            @csrf--}}
{{--                                            <input name="name" id="comment" placeholder="mời bạn để lại câu hỏi" style="width: 100%;font-size: 11px;" rows="4" />--}}
{{--                                            <div style="float: right;margin: 10px;"><input type="submit" value="Gửi"></div>--}}
{{--                                        </form>--}}
                                        <form action="{{route('comment',$product->id)}}" method="post" style="border:1px solid" multiple="">
                                            @csrf
                                            <fieldset>
                                                <textarea name="name" id="comment" placeholder="Mời bạn để lại bình luận" style="width: 100%;font-size: 14px" rows="4"></textarea>
                                                <div style="float: right;margin: 10px;font-size: 13px"><input type="submit" value="Gửi"></div>
                                            </fieldset>
                                        </form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($comment as $comment)
                                                    <div class="comment-box-wrapper" style="width: 700px;">
                                                        <div class="comment-box">
                                                <span style="width:50px;height: 50px; background: #dddddd;border-radius: 50px;text-align: center;padding-top: 10px">
                                                  </span>
                                                            <div class="comment-content">
                                                                <div class="commenter-head"><span class="commenter-name"><a href="" style="font-size: 20px" >{{$comment->user->name}}</a></span>
                                                                    <span style="font-size: 13px" class="comment-date"><i style="font-size: 13px" class="fa fa-clock"></i>
                                                          {{$comment->caculateMinute()}}
                                                        </span></div>
                                                                <div class="comment-body" style="width: 600px;">
                                                                    <span class="comment" style="font-size: 13px">{{$comment->name}}</span>
                                                                </div>
                                                                <div class="comment-footer" style="font-size: 12px">
                                                                    <span class="comment-reply">{{count($comment->commentreplys)}} comment</span>
                                                                    <a href="{{route('delete-comment-font',$comment->id)}}">delete</a>
                                                                    <span style="cursor: pointer" href="" class="comment-action" onclick="togglereplay111({{$comment->id}})">Reply</span>
                                                                </div>
                                                                <div class="reply-form-{{$comment->id}} hidden">
                                                                    <form action="{{route('rep-comment',[$comment->id,$product->id])}}" method="post" style="border:1px solid" multiple="">
                                                                        @csrf
                                                                        <fieldset>
                                                                            <textarea name="name" id="comment" placeholder="bạn để lại bình luận" style="width: 100%;" rows="2"></textarea>
                                                                            <div style="float: right;margin: 10px;"><input type="submit" value="Gửi"></div>
                                                                        </fieldset>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nested-comments">
                                                            <div class="comment-box-wrapper"  style="width: 600px">
                                                                @if(!empty($comment->commentreplys))
                                                                    @foreach($comment->commentreplys as $cp)
                                                                        <div class="comment-box" style="margin-bottom: 10px">
                                                                <span style="width:50px;height: 50px; background: #dddddd;border-radius: 50px;text-align: center;padding-top: 10px;">
                                                                </span>
                                                                            <div class="comment-content">
                                                                                <div class="commenter-head"><span class="commenter-name"><a style="font-size: 13px" href="" >{{$cp->user->name}}</a></span> <span style="font-size: 13px" class="comment-date"><i class="fa fa-clock"></i>
                                                                          {{$comment->caculateMinute()}}
                                                                    </span></div>
                                                                                <div class="comment-body" style="width: 500px">
                                                                                    <span style="font-size: 13px" class="comment">@if(!$cp->user_reply_id) @ {{$cp->comment->user->name}} @else @ {{$cp->userrep->name}} @endif    &nbsp{{$cp->name}}</span>
                                                                                </div>
                                                                                <div style="font-size: 13px" class="comment-footer">
                                                                                    <a  href="{{route('delete-comment-reply',$cp->id)}}">delete</a>
                                                                                    <span class="comment-reply"> <span style="cursor: pointer" class="" onclick="toggle({{$cp->id}})">Reply</span></span>
                                                                                </div>
                                                                                <div class="rep-comment-{{$cp->id}} hidden">
                                                                                    <form action="{{route('repuser-comment',[$cp->comment_id,$product->id,$cp->user_id,$cp->id])}}" method="post" style="border:1px solid" multiple="">
                                                                                        @csrf
                                                                                        <fieldset>
                                                                                            <textarea name="name" id="comment" placeholder="trả lời bình luận" style="width: 100%;" rows="2"></textarea>
                                                                                            <div style="float: right;margin: 10px;"><input type="submit" value="Gửi"></div>
                                                                                            @if (session('mes'))
                                                                                                <div class="alert alert-success">
                                                                                                    <p>{{ session('mes') }}</p>
                                                                                                </div>
                                                                                            @endif
                                                                                        </fieldset>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif

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
                            <button type="submit"  class="btn btn-primary" style="margin-left: 50%">Đánh giá</button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="row">
                <h3>{{$persons .' '}}người đã đánh giá sản phẩm: {{$product->product_name}}</h3>
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
                                            <span
                                                style="background: #f13b43;padding: 3px 8px;font-size: 15px;position: absolute;right: 0;color: #fff;">Hết hàng</span>
                                        @endif
                                        @if($product->sale >0)
                                            <span
                                                style="background: #3eb3f1;padding: 3px 8px;font-size: 15px;position: absolute;left: 0;color: #fff;">Sale {{$product->sale}} % </span>
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
        function togglereplay111(id){
            $('.reply-form-'+id).toggleClass('hidden');
        }
        function toggle(id){
            $('.rep-comment-'+id).toggleClass('hidden');
        }
        function changeImage($id){
            let $image=document.getElementById('image-change').getAttribute('src');
            let $imagePath=document.getElementById($id).getAttribute('src');
            document.getElementById('image-change').setAttribute('src',$imagePath);
            document.getElementById($id).setAttribute('src',$image);
        }


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
