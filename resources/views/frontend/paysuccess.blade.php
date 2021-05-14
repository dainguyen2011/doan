@extends('frontend.master')
@section('content')

    <div class="container">
        <h3 style="text-align: center;">Thanh toán hóa đơn thành công</h3>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                        <h4>Cảm ơn bạn đã tin dùng sản phẩm của chúng tôi. Đơn hàng sẽ giao đến bạn một cách sớm nhất.</h4>
                        <span>Mọi thắc mắc xin liên hệ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-sx btn-success"><i class="fab fa-facebook"></i></button>&nbsp;
                        <button class="btn btn-sx btn-success"><i class="fab fa-twitter"></i></button>&nbsp;
                        <button class="btn btn-sx btn-success"><i class="fab fa-instagram"></i></button>&nbsp;
                        <button class="btn btn-sx btn-success"><i class="fab fa-google-plus"></i></button>
                        <br><br>
                        <span>Hoặc bạn có thể gửi email cho chúng tôi tại đây</span>&nbsp;&nbsp;
                        <a class="button button-account" href="{{route('contact')}}">Email</a>
            </div>
        </div>
    </div>

@endsection
