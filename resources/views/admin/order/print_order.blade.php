<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>In</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body onload="window.print()">
<div class="col-md-12 col-sm-5">

            <h2>In hóa đơn</h2>


                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Thanh toán</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                        </tr>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer->first_name ." ".$order->customer->last_name}}</td>
                            <td>{{$ten_ao}}</td>
                            <td>{{number_format($order->total)}} <sup>vnđ</sup></td>
                            <td>{{number_format($order->paid)}} <sup>vnđ</sup></td>
                            <td>{{$order->customer->phone_number}}</td>
                            <td>{{$order->customer->address}}</td>
                        </tr>
                    </table>
</div>
</body>
</html>
