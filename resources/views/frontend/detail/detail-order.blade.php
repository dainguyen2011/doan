@extends('frontend.master')
@section('content')
    <div class="container">
        <div class="row centered-form">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Vui lòng điền thông tin đơn hàng</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-4 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="order_id" class="form-control input-sm"
                                           placeholder="Mã đơn hàng"
                                           value="{{ isset($order_id) ? $order_id : old('order_id') }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control input-sm"
                                           placeholder="Họ"
                                           value="{{ isset($first_name) ? $first_name : old('first_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control input-sm"
                                           placeholder="Số điện thoại"
                                           value="{{ isset($phone) ? $phone : old('phone') }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control input-sm"
                                           placeholder="Tên"
                                           value="{{ isset($last_name) ? $last_name : old('last_name') }}">
                                </div>
                            </div>
                        </div>
                        <input style="width: 6%;text-align: center;align-content: center;margin: 0 auto;" type="submit"
                               value="Xem" class="btn btn-info btn-block">
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-dark ">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trạng thái đơn hàng</th>
                    <th scope="col">Đã thanh toán</th>
                </tr>
                </thead>
                <tbody>
                @if($order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customer->first_name . ' ' . $order->customer->last_name}}</td>
                        <td>{{$order->customer->address }}</td>
                        <td>{{$order->customer->phone_number }}</td>
                        @if($order->status_1 == 0 )
                            <td>Đang chờ xử lý</td>
                        @endif
                        @if($order->status_1 == 1 )
                            <td>Đang xử lý</td>
                        @endif
                        @if($order->status_1 == 2 )
                            <td>Đã xử lý</td>
                        @endif
                        <td>{{number_format($order->paid) }} vnđ</td>
                        <th nowrap="">
                            @if($order->status_1 ==0)
                                <a onclick="return confirm('Bạn có hủy đơn hàng này không ?')"
                                   href="{{route('xoa-don-hang-client',$order->id)}}" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            @endif
                        </th>
                    </tr>
                    @if($order->status_1 ==0)
                        <h4 style="text-align: center">Đơn hàng của bạn sẽ đựơc xử lý trong vòng 72h tới</h4>
                    @endif
                    @if($order->status_1 ==2)
                        <h4 style="text-align: center">Bạn sẽ nhận được hàng trong vòng 72h tới kể từ
                            ngày {{date_format($order->updated_at,'d-m-Y')}}</h4>
                        <h4 style="text-align: center">Bạn có thể đổi trả trong vòng 48h sau khi nhận hàng</h4>

                    @endif
                @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
