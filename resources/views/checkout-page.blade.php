{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Thanh toán qua paypal</title>--}}
{{--    <style type="text/css">--}}
{{--        *{--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        body{--}}
{{--            display: flex;--}}
{{--            background: #c3c3c3;--}}
{{--            min-height: 100vh;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--        }--}}
{{--        .pay-area{--}}
{{--            display: block;--}}
{{--            width: 300px;--}}
{{--            padding: 35px;--}}
{{--            background: #ffffff;--}}
{{--        }--}}
{{--        input{--}}
{{--            display: block;--}}
{{--            width: 100%;--}}
{{--            padding: 5px 15px;--}}
{{--        }--}}
{{--        button{--}}
{{--            padding: 5px 10px;--}}
{{--            background: #3c3c3c;--}}
{{--            cursor: pointer;--}}
{{--            color: #ffffff;--}}
{{--        }--}}
{{--        .m-2{--}}
{{--            margin: 20px auto;--}}
{{--            display: block;--}}
{{--        }--}}
{{--        .error{--}}
{{--            color: red;--}}
{{--            font-size: small;--}}
{{--        }--}}
{{--        .success{--}}
{{--            color: green;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<section class="pay-area">--}}
{{--    <div>--}}
{{--        <img height="60" src="{{ asset('paypal-logo.png') }}">--}}
{{--        @if (session('error') || session('success'))--}}
{{--            <p class="{{ session('error') ? 'error':'success' }}">--}}
{{--                {{ session('error') ?? session('success') }}--}}
{{--            </p>--}}
{{--        @endif--}}
{{--        <form method="POST" name="myForm" action="{{ route('create-payment') }}">--}}
{{--            @csrf--}}
{{--            <div class="m-2">--}}
{{--                <input type="text" name="amount" placeholder="Amount" value="{{$price}}" readonly>--}}
{{--                @if ($errors->has('amount'))--}}
{{--                    <span class="error"> {{ $errors->first('amount') }} </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <button>Thanh toán</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<script type="text/javascript">--}}
{{--    window.onload=function(){--}}
{{--        submitform();--}}
{{--        function submitform(){--}}
{{--            document.forms["myForm"].submit();--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Thanh toán qua payPal</title>
</head>
<style type="text/css">
    /*Contact sectiom*/
    .content-header {
        font-family: 'Oleo Script', cursive;
        color: #fcc500;
        font-size: 45px;
    }

    .section-content {
        text-align: center;

    }

    #contact {

        font-family: 'Teko', sans-serif;
        padding-top: 60px;
        width: 100%;
        height: 550px;
        background: #3a6186; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #3a6186, #89253e); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #3a6186, #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: #fff;
    }

    .contact-section {
        padding-top: 40px;
    }

    .contact-section .col-md-6 {
        width: 50%;
    }

    .form-line {
        border-right: 1px solid #B29999;
    }

    .form-group {
        margin-top: 10px;
    }

    label {
        font-size: 1.3em;
        line-height: 1em;
        font-weight: normal;
    }

    .form-control {
        font-size: 1.3em;
        color: #080808;
    }

    textarea.form-control {
        height: 135px;
        /* margin-top: px;*/
    }

    .submit {
        font-size: 1.1em;
        float: right;
        width: 150px;
        background-color: transparent;
        color: #fff;

    }

</style>
<body>
<section class="checkout spad" style="background: linear-gradient(to left, #3a6186 , #89253e);">
    <div class="container-half-fluid">
        <div class="checkout__form">
            <div class="checkout__order">
                <div class="section-content">
                    <h1 class="section-header">Xin lỗi <span class="content-header wow fadeIn " data-wow-delay="0.2s"
                                                             data-wow-duration="2s"> Vì sự bất tiện này</span></h1>
                    <h3>Đang điều hướng vui lòng chờ</h3>
                </div>
                <form method="POST" name="myForm" action="{{ route('create-payment') }}" style="display: none">
                    @csrf
                    <input type="text" name="amount" placeholder="Amount" value="{{$price}}" readonly>
                    <button type="submit" class="site-btn">PLACE ORDER</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    window.onload = function () {
        submitform();

        function submitform() {
            document.forms["myForm"].submit();
        }
    }
</script>
</body>
</html>
