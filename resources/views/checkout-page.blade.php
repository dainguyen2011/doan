<!DOCTYPE html>
<html>
<head>
    <title>Laravel Paypal</title>
    <style type="text/css">
        *{
            box-sizing: border-box;
        }
        body{
            display: flex;
            background: #c3c3c3;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .pay-area{
            display: block;
            width: 300px;
            padding: 35px;
            background: #ffffff;
        }
        input{
            display: block;
            width: 100%;
            padding: 5px 15px;
        }
        button{
            padding: 5px 10px;
            background: #3c3c3c;
            cursor: pointer;
            color: #ffffff;
        }
        .m-2{
            margin: 20px auto;
            display: block;
        }
        .error{
            color: red;
            font-size: small;
        }
        .success{
            color: green;
        }
    </style>
</head>
<body>
<section class="pay-area">
    <div>
        <img height="60" src="{{ asset('paypal-logo.png') }}">
        @if (session('error') || session('success'))
            <p class="{{ session('error') ? 'error':'success' }}">
                {{ session('error') ?? session('success') }}
            </p>
        @endif
        <form method="POST" name="myForm" action="{{ route('create-payment') }}">
            @csrf
            <div class="m-2">
                <input type="text" name="amount" placeholder="Amount" value="{{$price}}">
                @if ($errors->has('amount'))
                    <span class="error"> {{ $errors->first('amount') }} </span>
                @endif
            </div>
            <button>Thanh toán</button>
        </form>
    </div>
</section>
<script type="text/javascript">
    window.onload=function(){
        submitform();
        function submitform(){
            document.forms["myForm"].submit();
        }
    }
</script>
</body>
</html>