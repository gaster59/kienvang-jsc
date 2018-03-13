@extends('layouts.front')

@section('title', 'Admin page')

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

@endsection