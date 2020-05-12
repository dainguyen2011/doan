@extends('admin.layouts.index')
@section('content')
    <div class="view-list-product">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Product name</th>
                <th>Image</th>
                <th>Published</th>
                <th>Category</th>
                <th>Ordering</th>
                <th>Price</th>
                <th>Sale_price</th>

                <th>Description</th>
                <th><a href="{{route('them-san-pham')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td style="width: 100px">{{$product->product_name}}</td>
                    <td style="width: 100px"><a  href="{{route('showDetail',$product->id)}}"><img style="width: 100px"  class="product-image-intro"
                                                                            src="{{ asset('/'.$product->product_image_intro)}}"></a>
                    </td>
                    <td nowrap="">{{$product->publish}}</td>
                    <td nowrap="">{{$product->category_id}}</td>
                    <td nowrap="">{{$product->ordering}}</td>
                    <td nowrap="">{{number_format($product->price)}} vnđ</td>
                    <td nowrap="">{{number_format($product->getPrice())}} vnđ</td>
                    <td style="width: 100px">{!! $product->description  !!}</td>
                    <th nowrap="">
                        <a href="{{route('sua-san-pham',$product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('xoa-san-pham',$product->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="{{route('list-image',$product->id)}}" class="btn btn-info"><i class="fa fa-info-circle"></i></a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <li style="text-align: center; list-style: none">
        {{ $products->links() }}
        </li>
    </div>
@endsection
