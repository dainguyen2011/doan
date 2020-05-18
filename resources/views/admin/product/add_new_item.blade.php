@extends('admin.layouts.index')

@section('content')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('post-add-product')}}" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <th>Tên sản phẩm</th>
                <th><input placeholder="Nhập tên sản phẩm" type="text" class="form-control" name="product_name"></th>
            </tr>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>
                    <input placeholder="Nhập ảnh" type="file" class="form-control" name="product_image_intro">
                </th>
            </tr>
            <tr>
                <th>Danh mục</th>
                <th>
                    <select  name="category_id">
                        <option value="8">Áo clb</option>
                        <option value="9">Áo đội tuyển</option>
                        <option value="10">Áo không logo</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Publish</th>
                <th>
                    <select name="publish">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Giá</th>
                <th>
                    <input placeholder="Nhập giá sản phẩm" type="number" name="price" class="form-control">
                </th>
            </tr>
            <tr>
                <th>Giá sale</th>
                <th>
                    <input placeholder="Nhập giá sale sản phẩm" type="number" name="sale" class="form-control">
                </th>
            </tr>

            <tr>
                <th>Yêu cầu</th>
                <th>
                    <input placeholder="Nhập ưu tiên sản phẩm" type="number" name="ordering" class="form-control">
                </th>
            </tr>
            <tr>
                <th>Số lượng</th>
                <th>
                    <input placeholder="Nhập số lượng sản phẩm" type="number" name="quantity" class="form-control">
                </th>
            </tr>
            <tr>
                <th>Mô tả</th>
                <th>
                    <textarea placeholder="Nhập mô tả sản phẩm" class="form-control" id="txt" name="description"></textarea>
                </th>
            </tr>
            <tr>
                <th>Mô tả đầy đủn</th>
                <th>
                    <textarea placeholder="Nhập mô tả đầy đủ sản phẩm" class="form-control" id="txt" name="full_description"></textarea>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-backward"></i></button>
                    </div>
                </td>
            </tr>
        </table>
        {{csrf_field()}}
    </form>
    <script language="javascript" >

        CKEDITOR.replace('txt');

    </script>
@endsection
