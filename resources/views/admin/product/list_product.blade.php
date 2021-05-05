@extends('admin.layouts.index')
@section('content')
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
    <b><h3>Danh sách sản phẩm</h3></b>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Giá sale</th>

            <th><a href="{{route('them-san-pham')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i></a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td style="width: 100px">{{$product->product_name}}</td>
                <td style="width: 100px"><a href="{{route('showDetail',$product->id)}}"><img style="width: 100px"
                                                                                             class="product-image-intro"
                                                                                             src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}"></a>
                </td>
                <td nowrap="">{{$product->quantity}}</td>
                <td nowrap="">abc</td>
                <td nowrap="">{{number_format($product->price)}} vnđ</td>
                <td nowrap="">{{number_format($product->getPrice())}} vnđ</td>
                {{--                    <td style="width: 100px">{!! $product->description  !!}</td>--}}
                <th nowrap="">
                    <a href="{{route('sua-san-pham',$product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('xoa-san-pham',$product->id)}}"
                       class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="{{route('list-image',$product->id)}}" class="btn btn-info"><i
                            class="fa fa-info-circle"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <li style="text-align: center; list-style: none">
        {{ $products->links() }}
    </li>
@endsection
