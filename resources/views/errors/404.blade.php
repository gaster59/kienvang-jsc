@extends('layouts.front')

@section('title', 'Thông tin tuyển dụng việc làm Nhật | Kiến vàng')

@section('css_path')
    @parent
    <link href="{{ asset('/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('js_path')
    @parent
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="error-template">
        <h1>Lỗi</h1>
        <h2>Không tìm thấy trang</h2>
        <div class="error-details">
            Xin lỗi, đã xảy ra lỗi, Yêu cầu trang không tìm thấy!
        </div>
        <div class="error-actions">
            <a href="{{ url(route('front.index')) }}" class="btn btn-primary btn-lg">
                Trang chủ </a>
            <a href="{{ route('front.contact') }}" class="btn btn-primary btn-lg"> Liên hệ </a>
        </div>
    </div>
  </div>
</div>

@endsection