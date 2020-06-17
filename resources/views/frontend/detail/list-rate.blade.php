@extends('frontend.master')
@section('content')
    <div class="container">
        <h3>{{$persons .' '}} đánh giá {{$product->product_name}}</h3>
    <div class="row">
        <div class="row">
            @foreach($rating as $rate)
                <div class="row" style="margin-top: 5%">
                    <div class="col-md-2">
                        <img
                            src="{{asset('/'.$rate->users->avatar)}}"
                            style="width: 126px;height: 137px;position: relative;border-radius: 100%;border: 6px solid #438eb9;margin-bottom: 16%;box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.1)"/>
                    </div>
                    <div class="col-md-2">
                        @php
                            \Carbon\Carbon::setLocale('vi');
                        @endphp
                        <p>{{\Carbon\Carbon::parse($rate->created_at)->diffForHumans()}}</p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$rate->users->name}}</strong></a>
                            @for($i = 1; $i <= $rate->rating; $i++)
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                            @endfor
                        </p>
                        <div class="clearfix"></div>
                        <p>{!! $rate->content !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        <li style="text-align: center; list-style: none">
            {{ $rating->links() }}
        </li>
    </div>
@endsection
