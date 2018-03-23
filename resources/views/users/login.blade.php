@extends('layouts.front')

@section('title', 'Đăng ký tài khoản | Kiến vàng')

@section('css_path')
    @parent
    <link href="{{ asset('/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('js_path')
    @parent
    <script src="{{ asset('/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
      $('.datepicker').datepicker();
    </script>
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
            <span class="breadcrumb-item active">Đăng ký</span>
        </nav>
    </div>
</div>



<div class="row" id="rigister">
    <div class="col-lg-9 col-md-12 reset_padding_l_r">
      <div class="col-lg-12">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a style="text-decoration: none;" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach
        </div> <!-- end .flash-message -->
      </div>
        <div class="col-lg-12">
          <div class="title"> Đăng Nhap</div>

          <form method="post" action="{{ url(route('front.checkdangnhap')) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="emailform">Email</label><span class="red"> (*) </span>
                <input name="email" type="text" class="form-control" id="emailform" placeholder="Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                  <div class="error">{{ $errors->first('email') }}</div>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="passwordform">Email</label><span class="red"> (*) </span>
                <input name="password" type="password" class="form-control" id="passwordform" placeholder="password" value="{{ old('password') }}">
                @if ($errors->has('password'))
                  <div class="error">{{ $errors->first('password') }}</div>
                @endif
              </div>
            </div>
            

            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>


    </div>
    <div class="col-lg-3 col-md-12">
      <div class="tabs-pane" style="margin-top: 0;">
        <div class="block background text-center">
            <div class="block-1 margin-bottom5">
               <div class="title_r">
                 Những ưu điểm khi đăng ký
               </div>
               <ul class="list-group">
                 <li class="list-group-item list-group-item-primary">Xem thông tin tuyển dụng VIP</li>
                 <li class="list-group-item list-group-item-action list-group-item-danger">Nhận được tư vấn việc làm hoàn toàn miễn phí</li>
                 <li class="list-group-item list-group-item-success">Hỗ trợ toàn diện sau khi nhận việc</li>
               </ul>
            </div>
            
            @foreach($companies as $company)
                <div class="block-1 margin-bottom5">
                    <a class="" href="#">
                        <img style="width: 238px;"
                             src="{{ url('/company/'.$company->avatar) }}">
                    </a>
                </div>
            @endforeach

        </div>
          
      </div>
      
    </div>
  </div>

@endsection