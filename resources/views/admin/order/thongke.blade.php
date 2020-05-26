@extends('admin.layouts.index')
@section('title_page','danh sách order')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h2>Thống kê đơn hàng</h2>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$product_count}}</div>
                                <div><h4>Tổng sản phẩm trong kho</h4></div>
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
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-red">
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
            <div class="col-md-4 col-sm-6">
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
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4 style="line-height: 36px; padding-left: 10px;">Danh sách order</h4>
                </div>
                <div class="grid-body ">
                    @if (Session::has('thongbao'))
                        <div class="alert alert-success">
                            {{ Session::get('thongbao') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên sản phẩm bán</th>
                            <th class="text-center">Số lượng đã bán</th>
                            <th class="text-center">Giá tiền</th>
                            <th class="text-center">Số lượng còn lại</th>
                            <th class="text-center">Tổng tiền bán được</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            @php
                                $price_product = 0;
                            @endphp
                            <tr class="text-center" style="height: 60px;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->pay}}</td>
                                <td>{{number_format($product->getPrice())}}<sup>vnđ</sup></td>
                                <td>{{$product->quantity}}</td>
                                @foreach($product->order_product as $order_product)

                                    @if($order_product->orders->status_1 == 2)
                                        @php
                                            $price_product +=  $order_product->product_qty * $order_product->product_price;
                                        @endphp
                                    @endif
                                @endforeach
                                <td>
                                    {{number_format($price_product)}} <sup>vnđ</sup>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-warning" href="{{ route('export') }}">Xuất file</a>
                </div>
            </div>
        </div>
    </div>
    <html>
    <head>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
        <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33" type="text/css" rel="stylesheet">
        <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33" type="text/css" rel="stylesheet">
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

    <div id="container"></div>


    <script>

        anychart.onDocumentReady(function() {
            // create column chart
            var chart = anychart.column();
            var chart1 = anychart.column();

            // turn on chart animation
            chart.animation(true);

            // set chart title text settings
            chart.title('Top sản phẩm được bán nhiều nhất');

                @foreach($products as $product)
            var series = chart.column([
                    ['{{$product->product_name}}', '{{$product->pay}}'],
                ]);
            var series1 = chart.column([
                ['{{$product->product_name}}', '{{$product->quantity}}'],
            ]);
            @endforeach

            // set series tooltip settings
            series.tooltip().titleFormat('{%X}');

            series.tooltip()
                .position('center-top')
                .anchor('center-bottom')
                .offsetX(0)
                .offsetY(5)
                .format('{%Value}{groupsSeparator: }');

            //
            series1.tooltip().titleFormat('{%X}');

            series1.tooltip()
                .position('center-top')
                .anchor('center-bottom')
                .offsetX(0)
                .offsetY(5)
                .format('{%Value}{groupsSeparator: }');

            // set scale minimum
            chart.yScale().minimum(0);

            // set yAxis labels formatter
            chart.yAxis().labels().format('{%Value}{groupsSeparator: }');

            // tooltips position and interactivity settings
            chart.tooltip().positionMode('point');
            chart.interactivity().hoverMode('by-x');

            // // axes titles
            chart.xAxis().title('Sản phẩm');
            chart.yAxis().title('Đã bán');

            // set container id for the chart
            chart.container('container');

            // initiate chart drawing
            chart.draw();
        });

    </script>
    </body>
    </html>
@endsection
