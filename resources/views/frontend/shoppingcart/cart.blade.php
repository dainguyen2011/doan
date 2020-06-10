@extends('frontend.master')
@section('content')
    <div class="chart-area">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('warning') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="chart-item table-responsive fix">
                        <table class="col-md-12">
                            <thead>
                            <tr>
                                <th class="th-product">Tên sản phẩm</th>
                                <th class="th-qty">Số lượng</th>
                                <th class="th-price">Size</th>
                                <th class="th-price">Giá tiền</th>
                                <th class="th-total">Tổng tiền</th>
                                <th class="th-delete">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $item)
                                <tr>
                                    <td class="th-product">
                                        {{$item->name}}
                                    </td>
                                    <td class="cart_quantity">
                                        <form action="{{URL::to('/update_cart_quality')}}" method="post"
                                              class="cart_quantity_button">
                                            {{csrf_field()}}
                                            <input style="width: 50px" class="cart_quantity_input" type="number"
                                                   name="cart_quality" value="{{$item->qty}}">
                                            <input type="hidden" value="{{$item->rowId}}" name="rowId_cart"
                                                   class="form-control">
                                            <button style="margin-left: 10px; color: green;" type="submit"
                                                    name="update_qty"><i
                                                    class="fa fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td class="th-size">{{$item->options->size }}</td>
                                    <td class="th-price">{{number_format($item->price)}} vnđ</td>
                                    <td class="th-total">{{number_format($item->price*$item->qty)}} vnđ</td>
                                    <td class="th-delete">
                                        <form action="{{route('remove-item-cart',$item->rowId)}}"
                                              onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng không?')"
                                              method="post">
                                            <button><i style="color: red" class="fa fa-trash"></i></button>
                                            {{csrf_field()}}
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            <tfoot>
                            <tr>
                                <td colspan="5">Tổng tiền</td>
                                <td>{{Cart::Subtotal(0,3)}} vnđ</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="cart-button pull-right">
                        @if(Cart::count() > 0)
                            <a type="button" class="btn btn-primary" href="{{route('thanh-toan')}}">THANH TOÁN</a>
                        @endif
                        <a type="button" class="btn btn-info" href="{{route('home')}}">TIẾP TỤC MUA HÀNG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
