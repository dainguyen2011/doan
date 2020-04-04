@extends('frontend.master')
@section('content')
    <!-- Checkout khach hang -->
    <div class="checkout-area">
        <div class="container">
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
                                        First Name <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="first_name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Last Name <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="last_name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Address <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="address" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        E-mail Address <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="email" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Phone <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input name="phone_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <button  style="margin: 10px" class="btn btn-primary pull-right">
                                        THANH TOÁN
                                    </button>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5" >
                    <div class="review-order">
                        <div class="checkout-head">
                            <h2>XEM LẠI HÓA ĐƠN</h2>
                        </div>
                        @foreach(Cart::content() as $product)
                                                <div class="single-review">
                                                    <div class="single-review-content fix">
                                                        <h2><a href="{{route('showDetail',$product->id)}}">Chi tiết sản phẩm bạn đã chọn</a></h2>
                                                        <p><span>Tên sản phẩm :</span> {{$product->name}} </p>
                                                        <p><span>size:</span> {{ ($product->options->has('size') ? $product->options->size : '')}} </p>
                                                        <p><span>Bạn đã chọn mua:</span> {{$product->qty}} sản phẩm </p>
                                                        <p><span>Giá tiền :</span> {{$product->price}} vnđ</p>
                                                        @endforeach
                                                        <p><span>Tổng :</span> {{Cart::subtotal()}} vnđ</p>

                                                    </div>
                                                </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
