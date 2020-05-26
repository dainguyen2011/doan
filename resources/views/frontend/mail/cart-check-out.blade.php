<html>
<head>
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
<body>

<h2>Thông tin đơn hàng</h2>

<table>
    <tr>
        <th>Mã đơn hàng</th>
        <th>Họ tên người liên hệ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
    </tr>
    <tr>
        <td>{{$order_id}}</td>
        <td>{{$request->first_name.' '.$request->last_name}}</td>
        <td>{{$request->email}}</td>
        <td>{{$request->phone_number}}</td>
        <td>{{$request->address}}</td>
    </tr>
</table>
<a href="{{env('APP_URL_EMAIL')}}/detail-order?order_id={{$order_id}}&first_name={{$request->first_name}}&phone={{$request->phone_number}}&last_name={{$request->last_name}}">Bạn hay nhấp chuột vào đây để xem chi tiết đơn
    hàng</a>

</body>
</html>

