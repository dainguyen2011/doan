@extends('admin.layouts.index')
@section('content')
    <div class="view-gallery">
        <h3>{{$product->product_name}}</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã sản phẩm</th>

                <th>Ảnh 1</th>
                <th>Ảnh 2</th>

                <th><a href="{{route('add-image-product',$product->id)}}" class="btn btn-primary">Thêm mới</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list_image as $image)
                <tr>
                    <td>{{$image->product_id}}</td>

                    <td nowrap><img style="width: 100px" class="product-image" src="{{ asset('/'.$image->image)}}"></td>
                    <td nowrap><img style="width: 100px" class="product-image" src="{{ asset('/'.$image->image1)}}">
                    </td>
                    <th nowrap>
                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{'xoa-san-pham',$product->id}}" class="btn btn-primary"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            @endforeach
            </tbody>
            <tr>
                <td colspan="3">
                    <div class="pull-right">
                        <a href="{{route('danh-sach-san-pham')}}" class="btn btn-primary"><i class="fa fa-backward"></i></a>
                    </div>
                </td>
            </tr>

        </table>
    </div>
@endsection
