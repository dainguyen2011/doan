@extends('admin.layouts.index')

@section('content')
    <h2> Thêm danh mục</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('post-add-category')}}" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <th>Tên danh mục</th>
                <th>
                    <input placeholder="Nhập tên danh mục" type="text" class="form-control" name="category_name">
                </th>
            </tr>
            <tr>
                <th>Danh mục cha</th>
                <td>
                    <select class="form-control" name="parent">
                        <option value="">Khách</option>
                        @foreach($list_root_category as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ảnh</th>
                <td><input type="file" name="image_category" class="form-control"></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <th>
                    <textarea placeholder="Nhập mô tả" class="form-control" name="description"></textarea>
                </th>
            </tr>
            <tr>
                <th>Yêu cầu</th>
                <th>
                    <input placeholder="Nhập yêu cầu" type="text" name="ordering" class="form-control">
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                        <a class="btn btn-danger" href="{{route('list-danh-muc')}}"><i class="fa fa-backward"></i></a>
                    </div>
                </td>
            </tr>
        </table>
        {{csrf_field()}}
    </form>
@endsection
