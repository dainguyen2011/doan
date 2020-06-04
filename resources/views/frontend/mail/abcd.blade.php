<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Check Out</title>
</head>
<body>
<div style="background:#f2f2f2">

    <div style="padding:0 10px;background-color:#f2f2f2">
        <div style="margin:0px auto;max-width:600px;background:#4cbd9b">
            <table role="presentation" cellpadding="0" cellspacing="0"
                   style="font-size:0px;width:100%;background:#4cbd9b" align="center" border="0">
                <tbody>
                <tr>
                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:28px 15px">
                        <div class="m_9042820344186223142mj-column-per-100"
                             style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="word-wrap:break-word;font-size:0px;padding:10px 0px" align="center">
                                        <div
                                            style="color:#fff;font-family:'Open Sans',Helvetica,'Hiragino Kaku Gothic ProN',Meiryo,Arial,sans-serif;font-size:24px;font-weight:600;line-height:36px;text-align:center">
                                            <div class="m_9042820344186223142contents-section-block"
                                                 style="padding-right:25px;padding-left:25px">
                                                Thanh toán hóa đơn<p
                                                    style="font-size:21px;font-weight:400;margin-top:3px;margin-bottom:0">
                                                    {{$request->created_at}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div style="margin:0px auto;max-width:600px;background:#fff">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#fff"
                   align="center" border="0">
                <tbody>
                <tr>
                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:10px 15px">
                        <div class="m_9042820344186223142mj-column-per-100"
                             style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="word-wrap:break-word;font-size:0px;padding:10px 0px" align="left">
                                        <div
                                            style="color:#4a4a4a;font-family:'Open Sans',Helvetica,'Hiragino Kaku Gothic ProN',Meiryo,Arial,sans-serif;font-size:16px;line-height:30px;text-align:left">
                                            <div class="m_9042820344186223142contents-section-block"
                                                 style="padding-right:25px;padding-left:25px">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                       class="m_9042820344186223142table-striped-list"
                                                       style="border-collapse:collapse;width:100%;font-size:16px;line-height:22px;color:#4a4a4a;border-bottom:solid 1px #eee">
                                                    <tbody>
                                                    <tr>
                                                        <td class="m_9042820344186223142table-striped-list__td"
                                                            style="font-weight:400;border-top:solid 1px #eee;border-left:solid 1px #eee;border-right:solid 1px #eee;padding-top:4px;padding-left:15px;padding-right:20px;padding-bottom:4px">
                                                            <p style="margin-top:8px;margin-bottom:6px"><b>Mã đơn hàng</b></p>
                                                            <p style="margin-top:8px;margin-bottom:6px">
                                                                <span
                                                                    style="padding-left:1em;padding-right:1em;color:#666">|</span>
                                                                <span>{{$order_id}}</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="m_9042820344186223142table-striped-list__td"
                                                            style="font-weight:400;border-top:solid 1px #eee;border-left:solid 1px #eee;border-right:solid 1px #eee;padding-top:4px;padding-left:15px;padding-right:20px;padding-bottom:4px">
                                                            <p style="margin-top:8px;margin-bottom:6px"><b>Họ tên người liên hệ</b></p>
                                                            <p style="margin-top:8px;margin-bottom:6px">
                                                                <span
                                                                    style="padding-left:1em;padding-right:1em;color:#666">|</span>
                                                                <span>{{$request->first_name.' '.$request->last_name}}</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="m_9042820344186223142table-striped-list__td"
                                                            style="font-weight:400;border-top:solid 1px #eee;border-left:solid 1px #eee;border-right:solid 1px #eee;padding-top:4px;padding-left:15px;padding-right:20px;padding-bottom:4px">
                                                            <p style="margin-top:8px;margin-bottom:6px"><b>Email</b></p>
                                                            <p style="margin-top:8px;margin-bottom:6px">
                                                                <span
                                                                    style="padding-left:1em;padding-right:1em;color:#666">|</span>
                                                                <span>{{$request->email}}</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="m_9042820344186223142table-striped-list__td"
                                                            style="font-weight:400;border-top:solid 1px #eee;border-left:solid 1px #eee;border-right:solid 1px #eee;padding-top:4px;padding-left:15px;padding-right:20px;padding-bottom:4px">
                                                            <p style="margin-top:8px;margin-bottom:6px"><b>Số điện thoại</b></p>
                                                            <p style="margin-top:8px;margin-bottom:6px">
                                                                <span
                                                                    style="padding-left:1em;padding-right:1em;color:#666">|</span>
                                                                <span>{{$request->phone_number}}</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="m_9042820344186223142table-striped-list__td"
                                                            style="font-weight:400;border-top:solid 1px #eee;border-left:solid 1px #eee;border-right:solid 1px #eee;padding-top:4px;padding-left:15px;padding-right:20px;padding-bottom:4px">
                                                            <p style="margin-top:8px;margin-bottom:6px"><b>Địa chỉ</b></p>
                                                            <p style="margin-top:8px;margin-bottom:6px">
                                                                <span
                                                                    style="padding-left:1em;padding-right:1em;color:#666">|</span>
                                                                <span>{{$request->address}}</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <a href="{{env('APP_URL_EMAIL')}}/detail-order?order_id={{$order_id}}&first_name={{$request->first_name}}&phone={{$request->phone_number}}&last_name={{$request->last_name}}">Bạn hay nhấp chuột vào đây để xem chi tiết đơn
                                                    hàng</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
