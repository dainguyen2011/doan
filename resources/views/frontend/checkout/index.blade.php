@extends('frontend.master')
@section('content')
    <!-- Checkout khach hang -->
    <div>
    <div class="checkout-area">
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="billing-address">
                        <div class="checkout-head">
                            <h2>HÓA ĐƠN</h2>
                            <p>Vui lòng điền đầy đủ thông tin khách hàng</p>
                        </div>
                        <div class="checkout-form">
                            <form action="{{route('thanh-toan')}}" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Họ<sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="first_name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Tên <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="last_name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Địa chỉ <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="address" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Email <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="email" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Số điện thoại <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="phone_number" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <button style="margin: 10px" class="btn btn-primary pull-right">
                                        THANH TOÁN
                                    </button>
{{--                                    @if($price_pay == null)--}}
{{--                                        <a href="{{route('create-payment')}}" style="margin: 10px"--}}
{{--                                           class="btn btn-primary pull-right">--}}
{{--                                            THANH TOÁN QUA THẺ ATM--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5">
                    <div class="review-order">
                        <div class="checkout-head">
                            <h2>XEM LẠI HÓA ĐƠN</h2>
                        </div>
                        @foreach(Cart::content() as $product)
                            <div class="single-review">
                                <div class="single-review-content fix">
                                    <h2><a href="{{route('showDetail',$product->id)}}">Chi tiết sản phẩm bạn đã chọn</a>
                                    </h2>
                                    <p><span>Tên sản phẩm :</span> {{$product->name}} </p>
                                    <p>
                                        <span>Size:</span> {{ ($product->options->has('size') ? $product->options->size : '')}}
                                    </p>
                                    <p><span>Bạn đã chọn mua:</span> {{$product->qty}} sản phẩm </p>
                                    <p><span>Giá tiền :</span> {{number_format($product->price)}} vnđ</p>
                                    @endforeach
                                    <p><span>Tổng :</span> {{Cart::subtotal(0,3)}} vnđ</p>
                                    <p><span>Đã thanh toán :</span> {{$price_pay}} vnđ</p>
                                    <div class="col-md-4">
                                        <a target="_blank" href="{{route('create-payment')}}"><img src="https://img.topbank.vn/2019/11/19/8Rg4Y4ZT/paypal-ebb2.jpg"></a>
                                    </div>
                                    <div class="col-md-4"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/1200px-Visa.svg.png"></div>
                                    <div class="col-md-4"><img src="https://pluspng.com/img-png/mastercard-hd-png-mastercard-png-picture-1456.png"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
