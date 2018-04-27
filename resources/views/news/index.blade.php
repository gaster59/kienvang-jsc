@extends('layouts.front')

@section('title', 'Tin tức | Kiến vàng')

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
@endsection

@section('content')
@include('layouts.home.bannermain')

<div class="row">
    <div class="col-lg-12 margin-top10">
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{ url(route('front.index')) }}">Trang chủ</a>
            <span class="breadcrumb-item active">Tin tức</span>
        </nav>
    </div>
</div>

<div class="row" id="page-news">
    <div class="col-lg-9 col-md-12 reset_padding">
        <div class="col-lg-12 reset_padding">
            <div class="yellow_title_box">
                <div class="yellow_title_left">Tin tức</div>
                <div class="yellow_title_right"></div>
            </div>
            <div class="yellow_title_bottom"></div>
        </div>
        <div class="col-lg-12 reset_padding">
            <ul class="list-unstyled list-news">
                @php
                    $i = 0;
                @endphp
                @foreach($news as $item)
                    @php
                        $cls = '';
                        if ($i%2 == 1) {
                            $cls = "background-color: rgb(239, 248, 250)";
                        }
                    @endphp
                    <li style="{{ $cls }}">
                        <div class="lng_right">
                            <div class="lng_right_top">
                                <a href="{{ url(route('front.news.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}" title="" target="_self">
                                    <span class="h1">{{ $item->name }}</span>
                                </a>
                                @if($item->is_hot == 1)
                                    <!-- <span class="newtag">Hot</span> -->
                                    <img class="imghot" src="{{ url('/images/hot.gif') }}">
                                @endif
                                <p class="des">
                                    {{ $item->description }}
                                </p>
                            </div>
                            <div class="lng_r_info">
                                <span class="date">{{ $item->updated_at }}</span>
                            </div>
                        </div>
                    </li>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </ul>


            <div class="text-center margin-top10">
                {{ $news->links() }}
            </div>
        </div>



    </div>
    <div class="col-lg-3 col-md-12">
        <div class="tabs-pane">
            <div class="block background text-center">
              @include('layouts.home.nav_right')
            </div>
        </div>

    </div>
</div>

@endsection