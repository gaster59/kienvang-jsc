@extends('layouts.front')

@section('title', 'Kiến vàng')
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
        <span class="breadcrumb-item active">{{$data->name}}</span>
      </nav>
    </div>
</div>

<div class="row" id="page-news-detail">
    <div class="col-lg-9 col-md-12">
          <div class="content-search">
            @if(!empty($categories[0]->id))
            <section>
              <div id="exTab2" class="padding-top20">
                <ul class="nav nav-tabs">
                  @foreach($categories as $key=> $val)
                    <li class="@if ($val->id == $data->id) {!!"active"!!} @endif">
                      {{-- <a href="#{{$key}}" data-toggle="tab">{{$val->name}} </a> --}}
                      <a href="{{ url(route('front.jobs.category',['slug'=> $val->slug] )) }}">{{$val->name}} </a>
                    </li>
                  @endforeach
                </ul>
                
                  <div class="tab-content ">
                  @if(!empty($categories[0]->id))
                    @foreach($categories as $key=> $val)
                      <div class="tab-pane @if ($val->id == $data->id) {!!"active"!!} @endif" id="{{$key}}">
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
                                @foreach($jobs as $val2=>$item)
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
                              {{ $jobs->links() }}
                            </div>
                        </div>
                      </div>
                    @endforeach

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