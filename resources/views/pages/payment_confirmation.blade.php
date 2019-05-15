@extends("app")

@section('head_title', getcong_widgets('about_title') .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

    <div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
        <div class="overlay">
            <div class="container">
                <h1>Payment Confirmation</h1>
            </div>
        </div>
    </div>

    <div class="what-we-do">
        <div class="container about_block">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="confirmation text-center">
                    <h1><i class="fa fa-check"></i></h1>
                    <h1>Payment Complete</h1>
                    <br/>
                    <a href="{{ route('menu.list') }}" class="btn font-montserrat">Continue Shopping</a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection