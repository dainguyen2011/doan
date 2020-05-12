<h3>Thông tin liên hệ </h3>
<p>{{$request->first_name}}</p>
<p>{{$request->last_name}}</p>
<p>{{$request->email}}</p>
<p>{{$request->phone}}</p>
<p>{{$request->message}}</p>
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

<h2>Thông tin liên hệ</h2>

<table>
    <tr>
        <th>Tên người liên hệ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Nội dung</th>
    </tr>
    <tr>
        <td>{{$request->first_name . $request->last_name}}</td>
        <td>{{$request->email}}</td>
        <td>{{$request->phone}}</td>
        <td>{{$request->message}}</td>
    </tr>
</table>

</body>
</html>

