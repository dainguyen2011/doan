@extends('admin.layouts.index')
@section('content')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <div class="view-edit-product">
        <b><h3>Sửa sản phẩm</h3></b>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('post-sua-san-pham',$product->id)}}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th><input type="text" class="form-control" value="{{$product->product_name}}" name="product_name">
                    </th>
                </tr>
                <tr>
                    <th>Ảnh sản phẩm</th>
                    <th>
                        <img style="width: 100px" class="product-image-intro-edit"  src="{{ asset('') }}/{{ pare_url_file($product->product_image_intro) }}">
                        <input type="file" value="{{$product->product_image_intro}}" class="form-control" name="product_image_intro">
                    </th>
                </tr>
                <tr>
                    <th>Danh mục</th>
                    <th>
                        <select class="form-control"  name="category_id">
                            @foreach($categories as $vl)
                                <option>{{$vl -> category_name}}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Publish</th>
                    <th>
                        <select class="form-control" name="publish">
                            <option <?php echo $product->publish == 1 ? ' selected ' : '' ?> value="1">Yes</option>
                            <option <?php echo $product->publish == 0 ? ' selected ' : '' ?> value="0">No</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Giá</th>
                    <th>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Giá sale</th>
                    <th>
                        <input type="number" name="sale" value="{{$product->sale}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Kích cỡ</th>
                    <th>
                        <input type="text" name="size" value="{{$product->size}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Yêu cầu</th>
                    <th>
                        <input type="number" name="ordering" value="{{$product->ordering}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Thương hiệu</th>
                    <th>
                        <input type="text" name="brand" value="{{$product->brand}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Nơi sản xuất</th>
                    <th>
                        <input type="text" name="brand" value="{{$product->address}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Yêu cầu</th>
                    <th>
                        <input type="text" name="address" value="{{$product->address}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Số lượng</th>
                    <th>
                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <th>
                        <textarea id="txt" class="form-control" name="description">{{$product->description}}</textarea>
                    </th>
                </tr>
                <tr>
                    <th>Mô tả đầy đủ</th>
                    <th>
                        <textarea class="form-control" id="txt"
                                  name="full_description">{{$product->full_description}}</textarea>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            <a href="{{route('danh-sach-san-pham')}}" class="btn btn-primary"><i class="fa fa-backward"></i></a>
                        </div>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
            <script language="javascript" >

                CKEDITOR.replace('txt');

            </script>
    </div>
@endsection
