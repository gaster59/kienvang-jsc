@extends('layouts.front')

@section('title', 'Ưng tuyển | Kiến vàng')

@section('css_path')
    @parent
    <link href="{{ asset('/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
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
            <span class="breadcrumb-item active">Ưng tuyển</span>
        </nav>
    </div>
</div>



<div class="row" id="page-news-detail">
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
          <div class="title"> Ưng tuyển : {{$dataJob->name}}</div>
          <form method="post" action="{{ url(route('front.jobs.checkApply')) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="namejob" value="{{$dataJob->name}}">
            <input type="hidden" name="job_id" value="{{$dataJob->id}}">
            <div class="form-group">
              <label for="inputAddress">Ghi chú</label>
              <textarea maxlength="100" name="note" type="text" class="form-control">{{old('note')}}</textarea>
            </div>

            <div class="form-group">
              <label for="inputqualifications">Gửi CV của bạn</label><span class="red"> (*) </span>
              <input type="file" name="cv" class="form-control">
              @if ($errors->has('cv'))
                  <div class="error">{{ $errors->first('cv') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Apply</button>
          </form>
        </div>
        
        <div class="col-lg-12 reset_padding" style="padding-left: 10px;">
          <div class="yellow_title_box">
            <div class="yellow_title_left">Công việc khác cùng chuyên ngành</div>
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