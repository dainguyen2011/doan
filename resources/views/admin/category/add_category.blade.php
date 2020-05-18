@extends('admin.layouts.index')

@section('content')
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
                <th><input type="text" class="form-control" name="category_name"></th>
            </tr>
            <tr>
                <th>Danh mục cha</th>
                <td>
                    <select name="parent">
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
                    <textarea class="form-control" name="description"></textarea>
                </th>
            </tr>
            <tr>
                <th>Yêu cầu</th>
                <th>
                    <input type="text" name="ordering" class="form-control">
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
@endsection
