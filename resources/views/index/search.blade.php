@extends('layouts.front')

@section('title', 'Tìm kiếm Kiến vàng')
@section('keywords', 'Kiến vàng')
@section('description', 'Kiến vàng')

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript">
        $(function(){
          $('.btn-search').click(function(){
            search();
          });
          $('.input-q').bind('keypress', function(e) {
              if(e.keyCode==13){
                  search();
              }
          });
        });
        function changeurl(string){
         var new_url= "{{ url(route('front.pagesearch')) }}" + string;
         window.history.pushState("data","Title",new_url);
         //document.title=string;
        }
        function search(){
            var data = {
                name : $('.input-q').val()
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : 'POST',
                dataType : 'json',
                data : data,
                async: false,
                url : '{{ url(route('front.postpagesearch')) }}',
                success : function (result){
                    if (result.error == false && result.html != '') {
                      $(".content-search").html(result.html);
                      //console.log(result.html);
                      changeurl("?tab=1&q="+$('.input-q').val());

                    }
                }
            });
        }
    </script>
@endsection

@section('content')
@include('layouts.home.bannermain')
<div class="row">
    <div class="col-lg-12 margin-top10">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{ url(route('front.index')) }}">Trang chủ</a>
        <span class="breadcrumb-item active">Search</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12">
          <div class="row">
            <div class="col-9 pr-0 mb-0 form-group">
              <input value="{{$keysearch}}" name="q" placeholder="Tìm kiếm" class="form-control input-q">
            </div>
            <div class="col-3 pl-05">
              <button class="btn btn-block btn-primary btn-search"><i aria-hidden="true" class="fa fa-search"></i><span class="hidden-xs-down"> Tìm</span></button>
            </div>
          </div>
          <div class="content-search">
            @if(!empty($jobs[0]->id) || !empty($news[0]->id))
            <section>
              <div id="exTab2" class="padding-top20">
                <ul class="nav nav-tabs">
                  @if(!empty($jobs[0]->id))
                  <li class="@if ($tab == 1) {!!"active"!!} @endif">
                    <a href="#1" data-toggle="tab">Tin tuyển dụng ({{$jobs->total()}})</a>
                  </li>
                  @endif
                  @if(!empty($news[0]->id))
                  <li class="@if ($tab == 2) {!!"active"!!} @endif">
                    <a href="#2" data-toggle="tab">Tin tức ({{$news->total()}})</a>
                  </li>
                  @endif

                </ul>
                
                  <div class="tab-content ">
                  @if(!empty($jobs[0]->id))
                    <div class="tab-pane @if ($tab == 1) {!!"active"!!} @endif" id="1">
                      <div class="bd-example">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Việc làm</th>
                                <th scope="col">Tên công ty</th>
                                <th scope="col">Ngành nghề</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($jobs as $val=>$item)
                              <tr>
                                <th scope="row">
                                  <a target="_blank" class="link" title="{{$item->name}}" href="{{ url(route('front.jobs.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}">{{$item->name}}</a>
                                </th>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->major_name }}</td>
                              </tr>
                              @endforeach
                              
                            </tbody>
                          </table>
                          <div class="text-center margin-top10">
                            {{ $jobs->appends(['tab' => 1,'q' => $keysearch])->links() }}
                          </div>
                      </div>
                    </div>
                  @endif
                  @if(!empty($news[0]->id))
                  <div class="tab-pane @if ($tab == 2) {!!"active"!!} @endif" id="2">
                    <div class="bd-example">
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
                                          <a href="{{ url(route('front.news.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}" title="" target="_blank">
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


                      <div class="text-center margin-top10">
                        {{ $news->appends(['tab' => 2,'q' => $keysearch])->links() }}
                      </div>

                    </div>
                  </div>
                  @endif

                  </div>
              </div>
            </section>
            @endif
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