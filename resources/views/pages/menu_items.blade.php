@extends("app")

@section('head_url', Request::url())

@section("content")

    <div class="sub-banner"
         style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
        <div class="overlay">
            <div class="container">
                <div id="sub_content" class="animated zoomIn">
                    <div class="col-md-12 col-sm-12">
                        <h1>Menu</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="restaurant_list_detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7 col-xs-12">
                    <div id="main_menu" class="box_style_2">
                        <h2 class="inner">Menu List</h2>
                        <table class="table table-striped cart-list">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Order</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menu_items as $item)
                                <tr>
                                    <td>
                                        <div class="rstl_img"><a href="#menu_{{$item->id}}">
                                                @if($item->menu_image)
                                                    <img src="{{ URL::asset('upload/menu/'.$item->menu_image.'-s.jpg') }}"/>
                                                @else
                                                    <img src="{{ URL::asset('upload/menu_img_s.png') }}"/>
                                                @endif
                                            </a></div>
                                        <div id="menu_{{$item->id}}" class="modalDialog">
                                            <div>
                                                <a href="#close" title="Close" class="close">X</a>
                                                <h2>{{$item->menu_name}}</h2>
                                                @if($item->menu_image)
                                                    <img src="{{ URL::asset('upload/menu/'.$item->menu_image.'-b.jpg') }}"/>
                                                @else
                                                    <img src="{{ URL::asset('upload/menu_img_s.png') }}"/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="rstl_img_contant">
                                            <h5>{{$item->menu_name}}</h5>
                                            <p>{{$item->description}}</p>
                                        </div>
                                    </td>
                                    <td><strong>{{getcong('currency_symbol')}} {{$item->price}}</strong></td>
                                    <td class="options">
                                        @if(Auth::check())
                                            <a href="{{URL::to('add_item/'.$item->id)}}"><i
                                                        class="fa fa-plus-square-o"></i></a>
                                        @else
                                            <a href="{{URL::to('login')}}"><i class="fa fa-plus-square-o"></i></a>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
                @include("_particles.sidebar")
            </div>
        </div>
    </div>

@endsection
