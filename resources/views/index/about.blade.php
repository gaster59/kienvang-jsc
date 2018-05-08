@extends('layouts.front')

@section('title', 'Giới thiệu công ty Kiến vàng')
@section('keywords', 'Kiến vàng')
@section('description', 'Kiến vàng')

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
        <span class="breadcrumb-item active">{{$nav}}</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12">
        <div class="col-lg-12">
        
        {!!$about->description!!}

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