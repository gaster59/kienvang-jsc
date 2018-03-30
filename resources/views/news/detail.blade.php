@extends('layouts.front')

@section('title', $dataNews->name.' | Kiến vàng')
@section('keywords', $dataNews->meta_keyword)
@section('description', $dataNews->meta_description)

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
        <a class="breadcrumb-item" href="{{ url(route('front.news')) }}">Tin tức</a>
        <span class="breadcrumb-item active">{{$dataNews->name}}</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12">
        <div class="col-lg-12 reset_padding_l_r">
          <div class="content">
            <h1 class="title">
              {{$dataNews->name}}
            </h1>
            <div class="des">
              <p class="time">{{$dataNews->created_at}}</p>
              <p>{{$dataNews->description}}</p>
            </div>
            <div class="main">
              
              {!!$dataNews->summary!!}

            </div>
          </div>



          <div class="col-lg-12 reset_padding">
            <div class="yellow_title_box">
              <div class="yellow_title_left">Tin tức liên quan</div>
              <div class="yellow_title_right"></div>
            </div>
            <div class="yellow_title_bottom"></div>
          </div>

            <ul class="list-unstyled list-news">
                @php
                    $i = 0;
                @endphp
                @foreach($newsList as $item)
                    @php
                        $cls = '';
                        if ($i%2 == 1) {
                            $cls = "background-color: rgb(239, 248, 250)";
                        }
                    @endphp
                    <li style="{{ $cls }}">
                        <div class="lng_right">
                            <div class="lng_right_top">
                                <a href="{{ url(route('front.news.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}" title="{{ $item->name }}" target="_self">
                                    <span class="h1">{{ $item->name }}</span>
                                </a>
                                @if($item->is_hot == 1)
                                    <span class="newtag">Hot</span>
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
              {{ $newsList->links() }}
            </div>
        </div>
        


    </div>
    <div class="col-lg-3 col-md-12">
      <div class="tabs-pane" style="margin-top: 0;">
        <div class="block background text-center">
          @include('layouts.home.nav_right')
        </div>
      </div>
      
    </div>
  </div>

@endsection