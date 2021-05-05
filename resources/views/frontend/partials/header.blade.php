<!-- HEADER AREA -->
<div class="header-area">
    <div class="header-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="header-top-left">
                        <div class="header-top-menu">
                        </div>
                        <p>Công ty cổ phần may mặc Bach Duong Diamond !</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="header-top-right">
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <h4 class="fas fa-user-circle">&nbsp;
                                            {{ Auth::user()->name }}</h4> <span
                                            class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if(Auth::check())
                                            <a href="{{route('profile')}}"> <i class="fa fa-arrow-circle-right"></i> Tài khoản</a><br>
                                        @endif
                                        @if(Auth::user() && Auth::user()->type == "admin")
                                            <a href="{{route('danh-sach-san-pham')}}"> <i class="fa fa-arrow-circle-right"></i> Trang quản trị</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           var  check = confirm('Bạn có chắc chắn muốn đăng xuất ?');
                                           if (check){
                                                     document.getElementById('logout-form').submit();}"><i class="fa fa-reply"></i>
                                            {{ __('Đăng xuất') }}

                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"

                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>

                                </li>

                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="header-logo">
                        <a href="{{route('home')}}"><img width="150px" id="logo1"
                                                         src="{{asset('assets/frontend/img/logo1.jpg')}}"
                                                         alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="search-chart-list">
                        <div class="header-search">
                            <form action="{{route('search')}}">
                                <input type="text" name="key" placeholder="Nhập tên áo cần tìm"
                                       value="{{ isset($key) ? $key : old('key') }}"/>
                                <button style="height: 35px;" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="cart">
                        <a class="btn btn-success btn-sm ml-3" href="{{route('gio-hang')}}">
                            <i style="height: 20px" class="fas fa-cart-plus"></i> Giỏ hàng
                            <span class="badge badge-light">{{Cart::count()}}</span>
                        </a>
                        {{csrf_field()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

