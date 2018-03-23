@extends('layouts.front')

@section('title', $dataJob->name.' | Kiến vàng')
@section('keywords', $dataJob->meta_keyword)
@section('description', $dataJob->meta_description)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
@endsection

@section('content')
@if(!empty($bannerMain))
<div class="row">
    <div class="col-lg-12 text-center margin-top10">
        <a title="" href="" target="_self">
            <img class="img-fluid" src="{{ url('/banner/'.$bannerMain->avatar) }}" title="{{ $bannerMain->title }}"></a>
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-12 margin-top10">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{ url(route('front.index')) }}">Trang chủ</a>
        <a class="breadcrumb-item" href="{{ url(route('front.news')) }}">Tin tuyển dụng</a>
        <span class="breadcrumb-item active">{{$dataJob->name}}</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12 reset_padding_l_r">
        <div class="col-lg-12 reset_padding_l_r">
          <div class="content">
            <h1 class="title">
              {{$dataJob->name}}
            </h1>
            <div class="des">
              <p class="time">{{$dataJob->created_at}}</p>
              <p>{{$dataJob->description}}</p>
            </div>
            <div class="main">
              
              {!!$dataJob->summary!!}

            </div>
          </div>



          <div class="col-lg-12 reset_padding" style="padding-left: 10px;">
            <div class="yellow_title_box">
              <div class="yellow_title_left">Tin tuyển dụng khác</div>
              <div class="yellow_title_right"></div>
            </div>
            <div class="yellow_title_bottom"></div>
          </div>

            <ul class="list-unstyled list-news">
                @php
                    $i = 0;
                @endphp
                @foreach($jobsList as $item)
                    @php
                        $cls = '';
                        if ($i%2 == 1) {
                            $cls = "background-color: rgb(239, 248, 250)";
                        }
                    @endphp
                    <li style="{{ $cls }}">
                        <div class="lng_right">
                            <div class="lng_right_top">
                                <a href="{{ url(route('front.jobs.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}" title="{{ $item->name }}" target="_self">
                                    <span class="h1">{{ $item->name }}</span>
                                </a>
                                {{-- <p class="des">
                                    {{ $item->description }}
                                </p> --}}
                                <p>{{ $item->company_name }}</p>
                                <p>{{ $item->major_name }}</p>
                            </div>
                            <div class="lng_r_info">
                                <span class="date">{{ $item->created_at }}</span>
                            </div>
                        </div>
                    </li>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </ul>


            <div class="text-center margin-top10">
              {{ $jobsList->links() }}
            </div>
        </div>
        


    </div>
    <div class="col-lg-3 col-md-12">
      <div class="tabs-pane" style="margin-top: 0;">
        <div class="block background text-center">

            @foreach($companies as $company)
                <div class="block-1 margin-bottom5">
                    <a title="{{$company->name}}" class="" target="_blank" href="{{$company->website}}">
                        <img style="width: 238px;"
                             src="{{ url('/company/'.$company->avatar) }}" alt="{{$company->name}}">
                    </a>
                </div>
            @endforeach

        </div>
          
      </div>
      
    </div>
  </div>

@endsection