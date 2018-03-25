@extends('layouts.front')

@section('title', 'Kiến vàng')

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
            @foreach($slider as $key=>$sliderval)
                @php
                    $classactive = ''
                @endphp
                @if($key == 0)
                    @php
                        $classactive = 'active'
                    @endphp
                @endif
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $classactive }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">

            @foreach($slider as $key=>$sliderval)
                @php
                    $classactive = ''
                @endphp
                @if($key == 0)
                    @php
                        $classactive = 'active'
                    @endphp
                @endif
                <div class="carousel-item {{ $classactive }}">
                    <img class="d-block img-fluid" src="{{ url('/banner/'.$sliderval->avatar) }}" alt="{{ $sliderval->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $sliderval->title }}</h3>
                        <p>{{ $sliderval->description }}</p>
                    </div>
                </div>
            @endforeach
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
                                                <a class="link" href="{{ url(route('front.jobs.detail', ['id'=>$job->id, 'slug'=> $job->slug] )) }}">{{ $job->name }}</a>
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
        @if(!\Illuminate\Support\Facades\Auth::check())
            <section>
                <div class="title-slogan">
                  <strong>Sau khi đăng nhập sẽ xem được thông tin việc làm dành cho thành viên</strong><br><br> <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Đăng nhập</a>
                </div>
                
            </section>
        @endif
        <section>
            <div class="" id="page-news">
                <div class="col-lg-12 reset_padding">
                    <div class="yellow_title_box">
                    <div class="yellow_title_left">Tin tức</div>
                    <div class="yellow_title_right"></div>
                    </div>
                    <div class="yellow_title_bottom"></div>
                </div>
                
                <ul class="list-unstyled list-news">
                    @php
                        $i = 0;
                    @endphp
                    @foreach($news as $item)
                        @php
                            $cls = '';
                            if ($i%2 == 1) {
                                $cls = "background-color: rgb(239, 248, 250)";
                            }
                        @endphp
                        <li style="{{ $cls }}">
                            <div class="lng_right">
                                <div class="lng_right_top">
                                    <a href="{{ url(route('front.news.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}" title="" target="_self">
                                        <span class="h1">{{ $item->name }}</span>
                                    </a>
                                    @if($item->is_hot == 1)
                                        <span class="newtag">Hot</span>
                                    @endif
                                    <p class="des">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="lng_r_info">
                                    <span class="date">{{ $item->updated_at }}</span>
                                </div>
                            </div>
                        </li>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </ul>
            </div>
            
        </section>

    </div>

    <div class="col-lg-3 col-md-12">
        <div class="tabs-pane">
            <div class="block background text-center">
              @include('layouts.home.nav_right')
            </div>
        </div>
    </div>

</div>

@endsection