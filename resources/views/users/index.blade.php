@extends('layouts.front')

@section('title', 'Đăng ký tài khoản | Kiến vàng')

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
            <span class="breadcrumb-item active">Đăng ký</span>
        </nav>
    </div>
</div>



<div class="row" id="rigister">
    <div class="col-lg-9 col-md-12 reset_padding_l_r">
        <div class="col-lg-12">
          <div class="title"> Đăng ký làm thành viên</div>
          <h3>Thông tin cơ bản</h3>
          <div class="res_notes">Các mục có dấu <span class="red"> * </span>  là bắt buộc</div>
          @if ( $errors->any() )
              <div class="alert bg-danger" role="alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form method="post" action="{{ url(route('front.checklogin')) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Họ và tên</label><span class="red"> (*) </span>
                <input name="name" type="text" class="form-control" id="inputName" placeholder="Họ và tên" value="{{ old('name') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">Email</label><span class="red"> (*) </span>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Địa chỉ</label>
              <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Nguyễn Thị MInh Khai" value="{{ old('address') }}">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputBirthday">Ngày tháng năm sinh</label>
                <input name="birthday" type="text" class="form-control" id="inputBirthday" value="{{ old('birthday') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPhone">Điện thoại</label>
                <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="Số điện thoại" value="{{ old('phone') }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Thành Phố</label>
                <input name="city" type="text" class="form-control" id="inputCity" value="{{ old('city') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Quận</label>
                <input name="state" type="text" class="form-control" id="inputState" value="{{ old('state') }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword">Mật khẩu</label>
                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPasswordRe">Nhập lại Mật khẩu</label>
                <input name="passwordre" type="password" class="form-control" id="inputPasswordRe" placeholder="Mật khẩu">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputSex">Giới tính</label>
                <select name="gerder" class="form-control">
                    <option @if (0 == old('gerder')) {!!"selected"!!} @endif value="0">Nam</option>
                    <option @if (1 == old('gerder')) {!!"selected"!!} @endif value="1">Nữ</option>
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
                  <option @if (0 == old('academiccareer')) {!!"selected"!!} @endif value="0">Lựa chọn</option>
                  <option @if (1 == old('academiccareer')) {!!"selected"!!} @endif value="1">Sau đại học</option>
                  <option @if (2 == old('academiccareer')) {!!"selected"!!} @endif value="2">Cử nhân</option>
                  <option @if (3 == old('academiccareer')) {!!"selected"!!} @endif value="3">Cao đẳng</option>
                  <option @if (4 == old('academiccareer')) {!!"selected"!!} @endif value="4">Trung học chuyên nghiệp</option>
                  <option @if (5 == old('academiccareer')) {!!"selected"!!} @endif value="5">Phổ thông trung học</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputSchool">Trường</label>
                <input name="school" type="text" class="form-control" id="inputSchool" value="{{ old('school') }} placeholder="Trường học">
              </div>
            </div>
            <div class="form-group">
              <label for="inputMajor">Ngành</label>
              <input name="major" type="text" class="form-control" id="inputMajor" value="{{ old('major') }} placeholder="Công nghệ thông tin">
            </div>

            <div class="form-group">
              <label for="inputqualifications">Bằng cấp khác</label>
              <textarea name="qualifications" class="form-control">{{ old('qualifications') }}</textarea>
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