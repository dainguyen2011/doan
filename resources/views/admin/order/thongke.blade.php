@extends('admin.layouts.index')
@section('title_page','danh sách order')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h2>Thống kê đơn hàng</h2>
            <div class="col-md-3">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$product_count}}</div>
                                <div><h4>Tổng mẫu sản phẩm trong kho</h4></div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('danh-sach-san-pham') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-recycle fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$order_count}}</div>
                                <div><h4>Số đơn chờ duyệt</h4></div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('list-don-hang') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check-circle fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$ordered_count}}</div>
                                <div><h4>Số đơn đã duyệt</h4></div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('list-don-hang') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$tonkho}}</div>
                                <div><h4>Tổng sản phẩm tồn kho</h4></div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('danh-sach-san-pham') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="panel-body">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4 style="line-height: 36px; padding-left: 10px;">Danh sách đơn hàng đã duyệt tháng <?php echo $month ?></h4>
                </div>
                <div class="grid-body ">
                    @if (Session::has('thongbao'))
                        <div class="alert alert-success">
                            {{ Session::get('thongbao') }}
                        </div>
                    @endif
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3"><select class="form-control" name="month" >
                                    <option value="1">Tháng 1</option>
                                    <option value="2">Tháng 2</option>
                                    <option value="3">Tháng 3</option>
                                    <option value="4">Tháng 4</option>
                                    <option value="5">Tháng 5</option>
                                    <option value="6">Tháng 6</option>
                                    <option value="7">Tháng 7</option>
                                    <option value="8">Tháng 8</option>
                                    <option value="9">Tháng 9</option>
                                    <option value="10">Tháng 10</option>
                                    <option value="11">Tháng 11</option>
                                    <option value="12">Tháng 12</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" type="submit">Tìm</button>
                            </div>


                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên sản phẩm bán</th>
                            <th class="text-center">Số lượng đã bán</th>
                            <th class="text-center">Giá tiền</th>
                            <th class="text-center">Số lượng còn lại</th>
                            <th class="text-center">Tổng tiền bán được</th>
                            <th class="text-center">Ngày bán</th>
                        </tr>
                        </thead>
                        @php
                            $price_product = 0;
                        @endphp
                        <tbody>
                        @foreach($products as $key => $product)
{{--                            @dd(date_format($productcreated_at))--}}
                            <tr class="text-center" style="height: 60px;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->product->product_name}}</td>
                                <td>{{$product->product_qty}}</td>
                                <td>{{number_format($product->product_price)}}<sup>vnđ</sup></td>
                                <td>{{$product->product->quantity}}</td>
                                <td>{{number_format($product->product_qty* $product->product_price)}} vnđ</td>
{{--                                @foreach($product->order_product as $order_product)--}}
{{--                              --}}

                                    @if($product->orders->status_1 == 2)
                                        @php
                                            $price_product += $product->product_qty* $product->product_price;
                                        @endphp
                                    @endif
{{--                                @endforeach--}}
{{--                                <td>--}}
{{--                                    {{number_format($price_product)}} <sup>vnđ</sup>--}}
{{--                                </td>--}}
                                <td>{{date_format($product->created_at, 'd-m-yy h:i:s')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th   colspan="6"><b style="margin-left: 50%;">Tổng tiền</b></th>
                            <td>{{number_format($price_product)}} vnđ</td>
                        </tr>
                        </tfoot>
                    </table>
                    <a class="btn btn-warning" href="{{ route('export') }}">Xuất file</a>
                </div>
            </div>
        </div>
    </div>
    <html>
    <head>
        <script
            src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
        <script
            src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
        <script
            src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
        <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"
              type="text/css" rel="stylesheet">
        <link
            href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"
            type="text/css" rel="stylesheet">
        <style type="text/css">

            html,
            body,
            #container {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }

        </style>
    </head>
    <body>

    <div id="container" style="width: 75%;">
        <h4 style="text-align: center">Thống kê doanh thu theo ngày trong tháng <?php echo $month ?>  </h4>
        <canvas id="canvas"></canvas>
    </div>
    <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="http://www.chartjs.org/samples/latest/utils.js"></script>

    <script>

        var chartdata = {

            type: 'bar',
            data: {
                labels: <?php echo $upd?>,
                datasets: [
                    {
                        label: ' Tháng <?php echo $month ?>',
                        backgroundColor: '#26A65B',
                        borderWidth: 1,

                        data: <?php echo $pay ?>,
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Số tiền bán được vnđ'
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày bán'
                        }
                    }]
                }
            }
        }

        var ctx = document.getElementById('canvas').getContext('2d');
        new Chart(ctx, chartdata);
        chart.xAxis().title('Sản phẩm');
        chart.yAxis().title('Sản phẩm');
    </script>
    </body>
    </html>
@endsection
