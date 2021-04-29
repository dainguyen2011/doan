@extends('frontend.master')
@section('content')
    <div class="container">
        @if(session('lienhe'))
            <div style="color: #ff151c;" class="well">
                @if(session('lienhe'))
                    {{session('lienhe')}}
                @endif
            </div>
        @endif
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">


                <form id="contact-form" method="post" action=" " role="form">
                    @csrf
                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_first_name">Họ *</label>
                                    <input style="width: 300px" id="form_first_name" type="text" name="first_name"
                                           class="form-control" placeholder="Nhập họ *" required="required"
                                           data-error="Họ bắt buộc nhập.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_last_name">Tên *</label>
                                    <input style="width: 300px" id="form_last_name" type="text" name="last_name"
                                           class="form-control" placeholder="Nhập tên*" required="required"
                                           data-error="Tên bắt buộc nhập.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input style="width: 300px" id="form_email" type="email" name="email"
                                           class="form-control" placeholder="Nhập email *" required="required"
                                           data-error="Email bắt buộc nhập.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_phone">Số điện thoại</label>
                                    <input style="width: 300px" id="form_phone" type="number" name="phone"
                                           class="form-control" placeholder="Nhập số điện thoại">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="align-content: center">
                                    <label for="form_message">Nội dung phản hồi *</label>
                                    <textarea style="width: 500px" id="form_message" name="message" class="form-control"
                                              placeholder="Nhập nội dung *" rows="4" required
                                              data-error="Vui lòng nhập nội dung."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="Gửi phản hồi">
                                </div>
                            </div>
                        </div>


                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
