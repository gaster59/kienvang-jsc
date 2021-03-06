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
      $('#category_id').on('change', function() {
        var val = this.value;
        if(val == 2){
          $(".uploadcv").css("display", "block");
        }else{
          $(".uploadcv").css("display", "none");
        }
      })
    </script>
@endsection

@section('content')
@include('layouts.home.bannermain')
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
          <div class="title"> Đăng ký làm thành viên</div>
          <h3>Thông tin cơ bản</h3>
          <div class="res_notes">Các mục có dấu <span class="red"> * </span>  là bắt buộc</div>
          <form method="post" action="{{ url(route('front.checkRegister')) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="method" value="register">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Họ và tên</label><span class="red"> (*) </span>
                <input maxlength="100" name="name" type="text" class="form-control" id="inputName" placeholder="Họ và tên" value="{{ old('name') }}">
                @if ($errors->has('name'))
                  <div class="error">{{ $errors->first('name') }}</div>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">Email</label><span class="red"> (*) </span>
                <input maxlength="100" name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                  <div class="error">{{ $errors->first('email') }}</div>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Địa chỉ</label><span class="red"> (*) </span>
              <input maxlength="100" name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Nguyễn Thị MInh Khai" value="{{ old('address') }}">
              @if ($errors->has('address'))
                  <div class="error">{{ $errors->first('address') }}</div>
                @endif
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputBirthday">Ngày tháng năm sinh</label>
                <input maxlength="20" name="birthday" type="text" class="form-control datepicker" id="inputBirthday" value="{{ old('birthday') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPhone">Điện thoại</label><span class="red"> (*) </span>
                <input maxlength="20" name="phone" type="text" class="form-control" id="inputPhone" placeholder="Số điện thoại" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                  <div class="error">{{ $errors->first('phone') }}</div>
                @endif
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Tỉnh/Thành Phố</label>
                <input maxlength="20" name="city" type="text" class="form-control" id="inputCity" value="{{ old('city') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Quận/Huyện</label>
                <input maxlength="20" name="state" type="text" class="form-control" id="inputState" value="{{ old('state') }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword">Mật khẩu</label><span class="red"> (*) </span>
                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu">
                @if ($errors->has('password'))
                  <div class="error">{{ $errors->first('password') }}</div>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="inputPasswordRe">Nhập lại Mật khẩu</label><span class="red"> (*) </span>
                <input name="password_confirmation" type="password" class="form-control" id="inputPasswordRe" placeholder="Mật khẩu">
                @if ($errors->has('password_confirmation'))
                  <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputSex">Giới tính</label>
                <select name="gender" class="form-control">
                    <option @if (0 == old('gender')) {!!"selected"!!} @endif value="0">Nam</option>
                    <option @if (1 == old('gender')) {!!"selected"!!} @endif value="1">Nữ</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCouple">Tình trạng hôn nhân</label>
                <select name="couple" class="form-control">
                    <option @if (0 == old('couple')) {!!"selected"!!} @endif value="0">Độc thân</option>
                    <option @if (1 == old('couple')) {!!"selected"!!} @endif value="1">Kết hôn</option>
                </select>
              </div>
            </div>
            
            <h3>Học vấn và kỷ năng</h3>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputhocvan">Học vấn</label><span class="red"> (*) </span>
                <select name="academiccareer" class="form-control">
                  <option @if (1 == old('academiccareer')) {!!"selected"!!} @endif value="1">Sau đại học</option>
                  <option @if (2 == old('academiccareer')) {!!"selected"!!} @endif value="2">Cử nhân</option>
                  <option @if (3 == old('academiccareer')) {!!"selected"!!} @endif value="3">Cao đẳng</option>
                  <option @if (4 == old('academiccareer')) {!!"selected"!!} @endif value="4">Trung học chuyên nghiệp</option>
                  <option @if (5 == old('academiccareer')) {!!"selected"!!} @endif value="5">Phổ thông trung học</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputSchool">Trường</label><span class="red"> (*) </span>
                <input maxlength="50" name="school" type="text" class="form-control" id="inputSchool" placeholder="Trường học" value="{{ old('school') }}">
                @if ($errors->has('school'))
                  <div class="error">{{ $errors->first('school') }}</div>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputMajor">Ngành</label><span class="red"> (*) </span>
              <input maxlength="50" name="major" type="text" class="form-control" id="inputMajor" placeholder="Công nghệ thông tin" value="{{ old('major') }}">
              @if ($errors->has('major'))
                  <div class="error">{{ $errors->first('major') }}</div>
                @endif
            </div>

            <div class="form-group">
              <label for="inputqualifications">Bằng cấp khác</label>
              <textarea maxlength="200" name="qualifications" class="form-control">{{ old('qualifications') }}</textarea>
            </div>
            <div class="form-group">
              <label for="inputMajor">Bạn là?</label><span class="red"> (*) </span>
              <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $val)
                  <option @if ($val->id ==  old('category_id') ) {!!"selected"!!} @endif value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group uploadcv" style="@if (old('category_id') == 2 ) {!!"display: block"!!} @else {!!"display: none"!!} @endif">
              <label for="inputqualifications">Gửi CV của bạn</label><span class="red"> (*) </span>
               <input type="file" name="cv" class="form-control">
               @if ($errors->has('cv'))
                  <div class="error">{{ $errors->first('cv') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
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
            
            @include('layouts.home.nav_right')

        </div>
          
      </div>
      
    </div>
  </div>

@endsection