@extends('layouts.front')

@section('title', 'Admin page 111')

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
@endsection

@section('content')

<div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/5.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>First slide label</h3>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="images/6.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second slide label</h3>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="images/7.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third slide label</h3>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="title-slogan">
        <strong>Dịch vụ hỗ trợ tìm việc miễn phí của Webtest</strong>
        <samp>Đăng nhập làm thành viên sẽ được chuyên viên hỗ trợ tìm việc miễn phí</samp>
    </div>
</div>
<div class="row">
    <div class="col-lg-9 col-md-12">
        <section>
            <div id="exTab2" class="padding-top20">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#1" data-toggle="tab">Việc làm mới nhất</a>
                    </li>
                    {{--<li><a href="#2" data-toggle="tab">Việc tìm kiếm nhiều nhất</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#3" data-toggle="tab">XKLĐ Nhật Bản</a>--}}
                    {{--</li>--}}
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                        <div class="bd-example">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Việc làm</th>
                                    <th scope="col">Tên công ty</th>
                                    <th scope="col">Ngành nghề</th>
                                    {{--<th scope="col">Ngày hết hạn</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <th scope="row">
                                                <a class="link" href="#">{{ $job->name }}</a>
                                            </th>
                                            <td>{{ $job->company_name }}</td>
                                            <td>{{ $job->major_name }}</td>
                                            {{--<td>21-10-2018</td>--}}
                                        </tr>
                                    @endforeach
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                        {{--</th>--}}
                                        {{--<td>400 - 750 USD</td>--}}
                                        {{--<td>Lâm Đồng</td>--}}
                                        {{--<td>21-10-2018</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                        {{--</th>--}}
                                        {{--<td>400 - 750 USD</td>--}}
                                        {{--<td>Lâm Đồng</td>--}}
                                        {{--<td>21-10-2018</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                        {{--</th>--}}
                                        {{--<td>400 - 750 USD</td>--}}
                                        {{--<td>Lâm Đồng</td>--}}
                                        {{--<td>21-10-2018</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                        {{--</th>--}}
                                        {{--<td>400 - 750 USD</td>--}}
                                        {{--<td>Lâm Đồng</td>--}}
                                        {{--<td>21-10-2018</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                        {{--</th>--}}
                                        {{--<td>400 - 750 USD</td>--}}
                                        {{--<td>Lâm Đồng</td>--}}
                                        {{--<td>21-10-2018</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                        {{--</th>--}}
                                        {{--<td>400 - 750 USD</td>--}}
                                        {{--<td>Lâm Đồng</td>--}}
                                        {{--<td>21-10-2018</td>--}}
                                    {{--</tr>--}}
                                </tbody>
                            </table>
                            <div class="text-center margin-top10">
                                {{--<ul class="pagination">--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>
                    </div>
                    {{--<div class="tab-pane" id="2">--}}
                        {{--<div class="bd-example">--}}
                            {{--<table class="table table-hover">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th scope="col">Việc làm</th>--}}
                                    {{--<th scope="col">Lương</th>--}}
                                    {{--<th scope="col">Nơi làm việc</th>--}}
                                    {{--<th scope="col">Ngày hết hạn</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">--}}
                                        {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                    {{--</th>--}}
                                    {{--<td>400 - 750 USD</td>--}}
                                    {{--<td>Lâm Đồng</td>--}}
                                    {{--<td>21-10-2018</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">--}}
                                        {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                    {{--</th>--}}
                                    {{--<td>400 - 750 USD</td>--}}
                                    {{--<td>Lâm Đồng</td>--}}
                                    {{--<td>21-10-2018</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">--}}
                                        {{--<a class="link" href="#">TUYỂN KỸ SƯ XÂY DỰNG LÀM VIỆC TẠI LÂM ĐỒNG</a>--}}
                                    {{--</th>--}}
                                    {{--<td>400 - 750 USD</td>--}}
                                    {{--<td>Lâm Đồng</td>--}}
                                    {{--<td>21-10-2018</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            {{--<div class="text-center margin-top10">--}}
                                {{--<ul class="pagination">--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="3">--}}
                        {{--<div class="bd-example">--}}
                            {{--<table class="table table-hover">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th scope="col">Việc làm</th>--}}
                                    {{--<th scope="col">Lương</th>--}}
                                    {{--<th scope="col">Nơi làm việc</th>--}}
                                    {{--<th scope="col">Ngày hết hạn</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">--}}
                                        {{--<a class="link" href="#">TUYỂN KỸ SƯ KINH DOANH KIÊM QUẢN LÝ LÀM VIỆC TẠI NHẬT BẢN</a>--}}
                                    {{--</th>--}}
                                    {{--<td>4100 - 7150 USD</td>--}}
                                    {{--<td>Tokyo</td>--}}
                                    {{--<td>21-10-2018</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">--}}
                                        {{--<a class="link" href="#">TUYỂN KỸ SƯ KINH DOANH KIÊM QUẢN LÝ LÀM VIỆC TẠI NHẬT BẢN</a>--}}
                                    {{--</th>--}}
                                    {{--<td>4100 - 7150 USD</td>--}}
                                    {{--<td>Tokyo</td>--}}
                                    {{--<td>21-10-2018</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th scope="row">--}}
                                        {{--<a class="link" href="#">TUYỂN KỸ SƯ KINH DOANH KIÊM QUẢN LÝ LÀM VIỆC TẠI NHẬT BẢN</a>--}}
                                    {{--</th>--}}
                                    {{--<td>4100 - 7150 USD</td>--}}
                                    {{--<td>Tokyo</td>--}}
                                    {{--<td>21-10-2018</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            {{--<div class="text-center margin-top10">--}}
                                {{--<ul class="pagination">--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>

    </div>

    <div class="col-lg-3 col-md-12">
        <div class="tabs-pane">
            <div class="block background text-center">
                @foreach($companies as $company)
                    <div class="block-1 margin-bottom5">
                        <a class="" href="#">
                            <img style="width: 238px;"
                                 src="{{ url('/company/'.$company->avatar) }}">
                        </a>
                    </div>
                @endforeach
                {{--<div class="block-1 margin-bottom5">--}}
                    {{--<a class="" href="#"><img style="width: 238px;" src="https://data.tienganh123.com/images/v2/home/button_dk.jpg"></a>--}}
                {{--</div>--}}
                {{--<div class="block-2 margin-bottom5">--}}
                    {{--<a href="#">--}}
                        {{--<img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>--}}
                {{--</div>--}}
                {{--<div class="block-3 margin-bottom5">--}}
                    {{--<a href="#">--}}
                        {{--<img style="width: 238px;" src="https://data.tienganh123.com/images/banner/banner-videochat.png" alt=""></a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

</div>

@endsection