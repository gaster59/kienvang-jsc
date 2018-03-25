@extends('layouts.front')

@section('title', 'Giới thiệu công ty Kiến vàng')
@section('keywords', 'Kiến vàng')
@section('description', 'Kiến vàng')

@section('css_path')
    @parent
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
        <span class="breadcrumb-item active">Thông tin công ty</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12">
        <div class="col-lg-12">
          
          <table cellpadding="0" cellspacing="0" class="table" width="100%">
            <tbody>
                <tr class="odd">
                    <td class="col_left">
                        Tên gọi</td>
                    <td class="col_right">
                        Công ty TNHH Kiến Vàng</td>
                </tr>
                <tr class="even">
                    <td class="col_left">
                        Ngày thành lập</td>
                    <td class="col_right">
                        Ngày 09 tháng 06 năm 2006</td>
                </tr>
                <tr class="odd">
                    <td class="col_left">
                        Giấy phép<br>
                        kinh doanh</td>
                    <td class="col_right">
                        Số 4102040083 do sở<br>
                        Kế hoạch đầu tư TP.HCM cấp</td>
                </tr>
                <tr class="even">
                    <td class="col_left">
                        Vốn đăng ký</td>
                    <td class="col_right">
                        20.000.000.000 VNĐ</td>
                </tr>
                <tr class="odd">
                    <td class="col_left">
                        Nhân viên</td>
                    <td class="col_right">
                        165 nhân viên</td>
                </tr>
                <tr class="even">
                    <td class="col_left">
                        Nội dung<br>
                        hoạt động</td>
                    <td class="col_right">
                        <p style="padding-left: 10px; text-indent: -10px;">
                            + Đào tạo và phái cử thực tập sinh, kỹ sư sang Nhật làm việc</p>
                        <p style="padding-left: 10px; text-indent: -10px;">
                            + Giới thiệu việc làm trong nước</p>
                        <p style="padding-left: 10px; text-indent: -10px;">
                            + Tư vấn cho các doanh nghiệp Nhật Bản đầu tư vào Việt Nam</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <h2 id="community"><div>Phương châm hoạt động<a class="anchorjs-link " href="#community" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h2>
        <p>Stay up to date on the development of Bootstrap and reach out to the community with these helpful resources.</p>
        <ul>
          <li>Follow <a href="">@getbootstrap on Twitter</a>.</li>
          <li>Read and subscribe to <a href="https://blog.getbootstrap.com">The Oficial Bootstrap Blog</a>.</li>
          <li>Join <a href="https://bootstrap-slack.herokuapp.com">the oficial Slack rôm</a>.</li>
          <li>Chat with fellow Bootstrappers in ỈC. On the <code class="highlighter-rouge">ỉc.freenode.net</code> server, in the <code class="highlighter-rouge">##bootstrap</code> channel.</li>
          <li>Implementation help may be found at Stack Overflow (tagged <a href="https://stackoverflow.com/questions/tagged/bootstrap-4"><code class="highlighter-rouge">bootstrap-4</code></a>).</li>
          <li>Developers should úe the keyword <code class="highlighter-rouge">bootstrap</code> on packages which modify ỏ add to the functionality ò Bootstrap when distributing through <a href="https://ư.npmjs.com/browse/keyword/bootstrap">npm</a> ỏ similar delivery mechanisms for maximum discoverability.</li>
        </ul>


        </div>
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