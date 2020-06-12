<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>In</title>
    <style>
        #form {
            background-color: #F9F9F9;
        }

        .blue {
            color: #2CAFFD;
        }

        #inputDado {
            border-radius: 30px;
            border: 1px solid #000;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body onload="window.print()">
<section id="form">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div>
                <img src="http://aobongda.com/Uploads/Module/htmlcontent/logo.png">
            </div>
            <div class="col-md-12 text-center">
                <h3 style="color: #b91f1f" class="text-uppercase">Hóa đơn thanh toán
                </h3>
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Mã đơn hàng</h5>
                                    <input readonly  type="name" class="form-control"  value="{{$order->id}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Tên khách hàng</h5>
                                    <input readonly type="email" class="form-control" value="{{$order->customer->first_name ." ".$order->customer->last_name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Tên sản phẩm</h5>
                                    <input readonly type="email" class="form-control" value="{{$ten_ao}}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Số lượng</h5>
                                    <input readonly type="email" class="form-control" value="{{$so_luong}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Tổng tiền</h5>
                                    <input readonly type="email" class="form-control" value="{{number_format($order->total). " vnđ"}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Thanh toán</h5>
                                    <input readonly type="email" class="form-control" value="{{number_format($order->paid). " vnđ"}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Số điện thoại</h5>
                                    <input readonly type="email" class="form-control" value="{{$order->customer->phone_number}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-left">Địa chỉ</h5>
                                    <input readonly type="email" class="form-control" value="{{$order->customer->address}}">
                                </div>
                                <p>Ngày xuất hóa đơn: {{$date_bill}}</p>
                            </div>
                            <h4 style="float: right; color: #36b91a">Địa chỉ: 137 Phan Bá Vành, Bắc Từ Liêm, TP Hà Nội</h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
