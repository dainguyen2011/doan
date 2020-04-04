@extends('admin.layouts.index')
@section('content')
    <div class="view-edit-product">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('post-add-image-product',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Product name</th>
                    <th><input readonly type="text" class="form-control" value="{{$product->product_name}}"
                               name="product_name"></th>
                </tr>
                <tr>
                    <th>Product image</th>
                    <th>
                        <input type="file" class="form-control" name="image">
                    </th>
                </tr>
                <tr>
                    <th>Product image 1</th>
                    <th>
                        <input type="file" class="form-control" name="image1">
                    </th>
                </tr>

                <tr>
                    <td colspan="3">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('list-image',$product->id)}}" class="btn btn-primary">Cancel</a>
                        </div>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
        <script type="text/javascript">
            //CKEDITOR.replace( 'full_description' );
        </script>
    </div>
@endsection
