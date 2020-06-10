<table class="table table-bordered table-responsive" onClick="window.print()">
    <thead>
    <tr>
        <th>STT</th>
{{--        <th>Tên khách hàng</th>--}}
{{--        <th>Tên sản phẩm</th>--}}
{{--        <th>Ảnh</th>--}}
{{--        <th>Số lượng</th>--}}
{{--        <th>Danh mục</th>--}}
{{--        <th>Tổng tiền</th>--}}
        <th>Đã Thanh toán</th>
    </tr>
    </thead>
    <tbody>
        <tr>
{{--            @foreach($item as $a)--}}
{{--            <td>{{$a->customer->first_name ." ".$a->customer->last_name}}</td>--}}
{{--            @endforeach--}}
{{--            <td style="width: 100px">{{$item->product->product_name}}</td>--}}
{{--            <td style="width: 100px"><a  href="{{route('showDetail',$product->id)}}"><img style="width: 100px"  class="product-image-intro"--}}
{{--                                                                                          src="{{ asset('') }}/{{ pare_url_file($item->product->product_image_intro) }}"></a>--}}
{{--            </td>--}}
{{--            <td nowrap="">{{$item->orderProducts->product_qty}}</td>--}}
{{--            @if($item->product->category_id ==8)--}}
{{--                <td nowrap="">Áo câu lạc bộ</td>--}}
{{--            @endif--}}
{{--            @if($item->product->category_id ==9)--}}
{{--                <td nowrap="">Áo đội tuyển</td>--}}
{{--            @endif--}}
{{--            @if($item->product->category_id ==10)--}}
{{--                <td nowrap="">Áo không logo</td>--}}
{{--            @endif--}}
            <td nowrap="">{{number_format($order->total)}} vnđ</td>
            <td nowrap="">{{number_format($order->paid)}} vnđ</td>
        </tr>
    </tbody>
</table>
