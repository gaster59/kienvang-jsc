<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="@hasSection('keywords')@yield('keywords'),Kiến Vàng @else Kiến Vàng @endif">
        <meta name="description" content="@hasSection('description')@yield('description') - Kiến Vàng @else Kiến Vàng @endif">

        @section('css_path')
            <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" media="screen">
            <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}" media="screen">
            <link rel="stylesheet" href="{{ asset('/css/custom.min.css') }}" media="screen">
            <link rel="stylesheet" href="{{ asset('/css/style.css') }}?r={{time()}}" media="screen">
        @show

    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a href="{{ url(route('front.index')) }}" class="navbar-brand">Kiến vàng
                    {{-- <img class="logo" src="https://cdn.viblo.asia/img/logo_full.fbfe575.svg" alt="Kiến vàng"> --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="nav navbar-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link" target="_self" href="{{ url(route('front.index')) }}">Trang chủ</a>
                        </li> --}}

                        @if(!empty($categories[0]->id))
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Tìm việc <span class="caret"></span></a>
                          <div class="dropdown-menu" aria-labelledby="themes">
                              @foreach($categories as $key=> $val)
                                <a class="dropdown-item" href="{{ url(route('front.jobs.category',['slug'=> $val->slug] )) }}">{{$val->name}}</a>
                              @endforeach
                          </div>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.news') }}" target="_self">Tin tức</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('front.nenkin') }}">Nenkin</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('front.about-us') }}">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('front.contact') }}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav-items nav-container navbar-right">
                    <li class="nav-item hidden-md-up">
                        <a href="{{ url(route('front.pagesearch')) }}" class="nav-icon"><i aria-hidden="true" class="fa fa-search"></i></a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                        <div class="search">
                            <input id="search-input" placeholder="Tìm kiếm" value="" class="search-input">
                            <button class="btn btn-primary" style="">
                              <a class="f-search" href="{{ url(route('front.pagesearch')) }}"><i class="fa fa-search"></i></a>
                            </button>
                            <i aria-hidden="true" class="fa fa-times sb-icon clr text-muted" style="display: none"></i>
                            <div class="sb__suggestions" style="display: none;">
                              
                            </div>



                        </div>
                    </li>
                    <li class="nav-item nav-user">
                      @if(\Illuminate\Support\Facades\Auth::check())
                          <div class="js-dropdown dropdown">
                            <div class="js-dropdown-toggle">
                              <div>
                                <img alt="{{\Illuminate\Support\Facades\Auth::user()['name']}}" title="{{\Illuminate\Support\Facades\Auth::user()['name']}}" src="{{ url('/images/user.png') }}">
                              </div>
                            </div>
                            <div id="myDropdown" class="dropdown-menu dropdown-menu-right">
                              <a href="{{ route('front.userinfo') }}" class="dropdown-item">
                                <i class="fa fa-user"></i> Thông tin
                              </a>
                              <div class="dropdown-divider"></div>
                              <div class="dropdown-item cursor-pointer">
                                <a href="{{ route('front.getLogout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                              </div>
                            </div>
                          </div>

                      @else
                          <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-in"></i>  Đăng nhập/Đăng ký
                          </a>
                      @endif
                    </li>
                </ul>
            </div>
        </div>

            <div class="container">
                @yield('content')

                <footer id="footer">
                    <div class="row">

                        @include('layouts.home.bannerfooter')


                        <div class="col-lg-12 margin-top10">
                            <ul class="list-unstyled">
                                <li class="float-lg-right"><a href="#top">Back to top</a></li>
                                <li><a href="{{ route('front.index')}}">Trang chủ</a></li>
                                <li><a href="{{ route('front.news') }}">Tin tức</a></li>
                                <li><a href="{{ route('front.about-us') }}">Giới thiệu</a></li>
                                <li><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer_info">
                                <p><strong>WebTest Co., Ltd.</strong></p>

                                <div class="font_weight">Giấy phép ĐKKD số: 0102852740 cấp bởi Sở Kế hoạch và Đầu tư Hà Nội.<br>
                                    Giấy phép đào tạo tiếng Anh số: 9816/QĐ-SGD&amp;ĐT cấp bởi Sở Giáo dục và Đào tạo Hà Nội.<br>
                                    Giấy phép cung cấp dịch vụ mạng xã hội học tiếng Anh trực tuyến số: 549/GP-BTTTT cấp bởi Bộ Thông tin &amp; Truyền thông. <br>
                                    Địa chỉ: <span class="black1"> số nhà 13,15,23, Nguyễn Thị Minh Khai, Quận 1, Tp. Hồ Chí Minh.<br>
                Tel: 0123 12 3123  hoặc  312 31 2312.</span> <br>
                                    <a href="" target="_self" title="Chính sách bảo mật thông tin">Chính sách bảo mật thông tin</a>&nbsp;|&nbsp;<a href="" target="_self" title="Quy định sử dụng">Quy định sử dụng</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </footer>
            </div>
            @if(!\Illuminate\Support\Facades\Auth::check())
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
                      </div>
                      <div class="modal-body" id="formlogin">
                      <form action="#" method="POST">
                          <div class="alert alert-danger error errorLogin" style="display: none;">
                            <span style="color: red; display: none;" class="error errorLogin"></span>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <input maxlength="100" name="email" id="email" type="text" class="form-control" placeholder="Email">
                                      <span style="color: red; display: none;" class="error errorEmail"></span>
                                  </div>
                                  <div class="form-group">
                                      <input name="password" id="password" type="password" class="form-control" placeholder="Mật khẩu">
                                      <span style="color: red; display: none;" class="error errorPassword"></span>
                                  </div>
                              </div>
                          </div>
                      </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-outline btn-danger" id="login">Đăng nhập</button>
                      </div>
                      <p class="text-center">Bạn chưa có tài khoản? <a href="{{ url(route('front.register')) }}"> Đăng ký</a></p>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            @endif

            @section('js_path')
                <script src="{{ asset('/js/jquery.min.js') }}"></script>
                <script src="{{ asset('/js/popper.min.js') }}"></script>
                <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
                <script src="{{ asset('/js/custom.js') }}"></script>
                <script type="text/javascript">
                  $(function(){
                    @if(!\Illuminate\Support\Facades\Auth::check())
                    $("#login").click(function(e) {
                      e.preventDefault();
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      $.ajax({
                          'url': '{{ url(route('front.checkdangnhap')) }}',
                          'type': 'POST',
                          'data': {
                            'email' : $("#email").val(),
                            'password'  : $("#password").val()
                          },
                          success: function(data){
                            //console.log(data);
                            if (data.error == true) {
                              $('.error').hide();
                              if (data.message.email != undefined) {
                                $('.errorEmail').show().text(data.message.email[0]);
                              }
                              if (data.message.password != undefined) {
                                $('.errorPassword').show().text(data.message.password[0]);
                              }
                              if (data.message.errorlogin != undefined) {
                                $('.errorLogin').show().text(data.message.errorlogin[0]);
                              }
                            } else {
                              location.reload();
                            }
                          }
                      });
                    });
                    @else
                    $(".js-dropdown").click(function(){
                      $("#myDropdown").toggle();
                    });
                    @endif

                      // Khai báo đối tượng timeout để dùng cho hàm
                      // clearTimeout
                      var timeout = null;
                   
                      // Sự kiện keyup
                      $('#search-input').keyup(function(){
                          // Xóa đi những gì ta đã thiết lập ở sự kiện 
                          // keyup của ký tự trước (nếu có)
                          clearTimeout(timeout);
                   
                          // Sau khi xóa thì thiết lập lại timeout
                          timeout = setTimeout(function ()
                          {
                              // Lấy nội dung search
                              var data = {
                                  name : $('#search-input').val()
                              };
                              // Gửi ajax search
                              $.ajax({
                                  type : 'GET',
                                  dataType : 'json',
                                  data : data,
                                  async: false,
                                  url : '{{ url(route('front.search')) }}',
                                  success : function (result){
                                      if (result.error == false && result.html != '') {
                                        $('.text-muted').show();
                                        $('.sb__suggestions').html(result.html);
                                        $('.sb__suggestions').show();

                                        //console.log(result.html);
                                      }else{
                                        $('.text-muted').show();
                                        $('.sb__suggestions').html('<div><div class="sb__suggestions-group"><header class="sb__suggestions-group__name">Không có kết quả</header></div></div>');
                                        $('.sb__suggestions').show();
                                      }
                                  }
                              });

                          }, 1000);
                      });
                      $('.text-muted').click(function(){
                        $('.sb__suggestions').html('');
                        $('.sb__suggestions').hide();
                        $(this).hide();
                        $('#search-input').val('');
                      });

                  });
                </script>
            @show

        </div>
    </body>
</html>