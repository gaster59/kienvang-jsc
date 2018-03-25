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
        <span class="breadcrumb-item active">Liên hệ với chúng tôi</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12">
        <div class="col-lg-12">
          <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a style="text-decoration: none;" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach
        </div> <!-- end .flash-message -->
          <form method="POST" action="{{ url('lien-he.html') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <fieldset>
            <legend class="text-center">Liên hệ</legend>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Họ và tên</label>
              <div class="col-md-9">
                <input value="{{ old('name') }}" name="name" type="text" placeholder="Họ và tên" class="form-control">
                @if ($errors->has('name'))
                  <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                @endif
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">E-mail</label>
              <div class="col-md-9">
                <input value="{{ old('email') }}" name="email" type="text" placeholder="Email" class="form-control">
                @if ($errors->has('email'))
                  <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                @endif
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Nội dung</label>
              <div class="col-md-9">
                <textarea value="{{ old('message') }}" class="form-control" id="message" name="message" placeholder="Nội dung..." rows="5"></textarea>
                @if ($errors->has('message'))
                  <div class="error" style="color: red">{{ $errors->first('message') }}</div>
                @endif
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Đăng ký</button>
              </div>
            </div>
          </fieldset>
          </form>

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