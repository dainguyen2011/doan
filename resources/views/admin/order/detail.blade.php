@extends('admin.layouts.index')
@section('content')
    @php
        $list_order_status=[
            "pending",
            "processing",
            "completed",
            "cancel",
        ]
    @endphp
    <div class="view-order-detail">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <form action="{{route('post-edit-order',$order->id)}}" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>{{$order->id}}</th>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <th>{{$order->customer->first_name ." ".$order->customer->last_name}}</th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>{{$order->total}},000 vnđ</th>
                </tr>
                <tr>
                    <th>State</th>
                    <th>
                        <select class="form-control" name="status">
                            @foreach($list_order_status as $status)
                                <option
                                    <?php echo $status == $order->status ? '  selected ' : '' ?> value="{{$status}}">{{$status}}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
            </table>
            <h3>List product</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Product quality</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list_product as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_qty}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@endsection
