@extends('frontend.master')
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

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="preview text-center">
                    <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <label>Tên :</label>
                    <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name" required placeholder="Nhập tên "/>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <label>Tên đầy đủ:</label>
                    <input class="form-control" type="text" value="{{Auth::user()->full_name}}" name="full_name" required placeholder="Nhập tên đầy đủ"/>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input class="form-control" value="{{Auth::user()->email}}" type="email" name="email" required placeholder="Nhập eamil"/>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input class="form-control" type="number" value="{{Auth::user()->phone}}" name="phone" required placeholder="Nhập số điện thoại"/>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <label>Ghi chú:</label>
                    <input class="form-control" type="text" value="{{Auth::user()->note}}" name="note" required placeholder="Nhập ghi chú"/>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện:</label>
                    <img src="{{url('/')}}/{{Auth::user()->avatar}}">
                    <input class="form-control" type="file" name="avatar"/>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label>Confirm Password:</label>--}}
{{--                    <input class="form-control" type="password" value="{{Auth::user()->password}}" name="password_confirmation" required placeholder="Enter Password"/>--}}
{{--                    <span class="Error"></span>--}}
{{--                </div>--}}
                <div class="form-group">
                    <label>Giới tính:</label><br/>
                    <label><input type="radio" name="gender" required value="1" checked /> Nam</label>
                    <label><input type="radio" name="gender" required value="2" /> Nữ</label>
                    <label><input type="radio" name="gender" required value="3" /> Khác</label>
                    <span class="Error"></span>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary btn-block" type="submit" value="Submit"/>
                </div>
                {{csrf_field()}}
            </form>

        <script type="text/javascript">
            //CKEDITOR.replace( 'full_description' );
        </script>
    </div>
@endsection
