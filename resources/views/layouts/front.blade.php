<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @section('css_path')
            <link rel="stylesheet" href="css/bootstrap.css" media="screen">
            <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="css/custom.min.css">
            <link rel="stylesheet" href="css/style.css" >
        @show

    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a href="" class="navbar-brand">WebTest</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Thực tập sinh <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="themes">
                                <a class="dropdown-item" href="../default/">Default</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../cerulean/">Cerulean</a>
                                <a class="dropdown-item" href="../cosmo/">Cosmo</a>
                                <a class="dropdown-item" href="../cyborg/">Cyborg</a>
                                <a class="dropdown-item" href="../darkly/">Darkly</a>
                                <a class="dropdown-item" href="../flatly/">Flatly</a>
                                <a class="dropdown-item" href="../journal/">Journal</a>
                                <a class="dropdown-item" href="../litera/">Litera</a>
                                <a class="dropdown-item" href="../lumen/">Lumen</a>
                                <a class="dropdown-item" href="../lux/">Lux</a>
                                <a class="dropdown-item" href="../materia/">Materia</a>
                                <a class="dropdown-item" href="../minty/">Minty</a>
                                <a class="dropdown-item" href="../pulse/">Pulse</a>
                                <a class="dropdown-item" href="../sandstone/">Sandstone</a>
                                <a class="dropdown-item" href="../simplex/">Simplex</a>
                                <a class="dropdown-item" href="../sketchy/">Sketchy</a>
                                <a class="dropdown-item" href="../slate/">Slate</a>
                                <a class="dropdown-item" href="../solar/">Solar</a>
                                <a class="dropdown-item" href="../spacelab/">Spacelab</a>
                                <a class="dropdown-item" href="../superhero/">Superhero</a>
                                <a class="dropdown-item" href="../united/">United</a>
                                <a class="dropdown-item" href="../yeti/">Yeti</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" target="_blank">Kỹ sư</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" target="_blank">Du học sinh</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

            <div class="container">
                @yield('content')

                <footer id="footer">
                    <div class="row">
                        <div class="col-lg-12 text-center margin-top10">
                            <a title="" href="" target="_self">
                                <img class="img-fluid" src="https://data.tienganh123.com/images/v2/home/banner_test.jpg"></a>
                        </div>
                        <div class="col-lg-12 text-center margin-top10">
                            <a title="" href="" target="_self">
                                <img class="img-fluid" src="https://data.tienganh123.com/images/banner/lt123_1000_90_new2.jpg"></a>
                        </div>
                        <div class="col-lg-12 margin-top10">
                            <ul class="list-unstyled">
                                <li class="float-lg-right"><a href="#top">Back to top</a></li>
                                <li><a href="">Trang chủ</a></li>
                                <li><a href="">Tin tức</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Dịch vụ</a></li>
                                <li><a href="">Thông tin việc làm và đào tạo</a></li>
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

            @section('js_path')
                <script src="js/jquery.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/custom.js"></script>
            @show

        </div>
    </body>
</html>