@extends('layouts.front')

@section('title', $dataNews->name.' | Kiến vàng')

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 text-center margin-top10">
        <a title="" href="" target="_self">
            <img class="img-fluid" src="{{ url('/banner/'.$bannerMain->avatar) }}" title="{{ $bannerMain->title }}"></a>
    </div>
</div>

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
    <div class="col-lg-9 col-md-12 reset_padding_l_r">
        <div class="col-lg-12 reset_padding_l_r">
          <div class="content">
            <div class="title">
              {{$dataNews->name}}
            </div>
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

            @foreach($companies as $company)
                <div class="block-1 margin-bottom5">
                    <a class="" href="#">
                        <img style="width: 238px;"
                             src="{{ url('/company/'.$company->avatar) }}">
                    </a>
                </div>
            @endforeach
            {{-- <div class="block-1 margin-bottom5">
               <a class="" href="#"><img style="width: 238px;" src="https://data.tienganh123.com/images/v2/home/button_dk.jpg"></a>
            </div>
            <div class="block-2 margin-bottom5">
              <a href="#">
                <img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>
            </div>
           <div class="block-3 margin-bottom5">
              <a href="#">
                <img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>
            </div>
            <div class="block-1 margin-bottom5">
               <a class="" href="#"><img style="width: 238px;" src="https://data.tienganh123.com/images/v2/home/button_dk.jpg"></a>
            </div>
            <div class="block-2 margin-bottom5">
              <a href="#">
                <img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>
            </div>
           <div class="block-3 margin-bottom5">
              <a href="#">
                <img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>
            </div>
            <div class="block-3 margin-bottom5">
              <a href="#">
                <img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>
            </div> --}}

        </div>
          
      </div>
      
    </div>
  </div>

@endsection