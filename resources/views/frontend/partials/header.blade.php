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
                                        {{ Auth::user()->name }} &nbsp;<i class="fas fa-user"></i> <span
                                            class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a style="cursor: pointer" href="{{route('detail-order')}}">Thông tin đơn hàng</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           var  check = confirm('Bạn có chắc chắn muốn đăng xuất ?');
                                           if (check){
                                                     document.getElementById('logout-form').submit();}">
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
                        <a href="{{route('home')}}"><img width="150px" id="logo1" src="{{asset('assets/frontend/img/logo1.png')}}"
                                                         alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="search-chart-list">
                        <div class="header-search">
                            <form action="{{route('search')}}">
                                <input type="text" name="key" placeholder="Nhập tên áo cần tìm"  value="{{ isset($key) ? $key : old('key') }}"/>
                                <button style="height: 35px;" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="cart">
                        <a class="btn btn-success btn-sm ml-3" href="{{route('gio-hang')}}">
                            <i style="height: 20px" class="fa fa-shopping-cart"></i> Giỏ hàng
                            <span class="badge badge-light">{{Cart::count()}}</span>
                        </a>
                        {{csrf_field()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

