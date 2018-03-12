@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript" src="{{ "/admin/js/ckeditor/ckeditor.js" }}"></script>
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">
                <a href="{{ url('admin/product') }}">
                    Sản phẩm
                </a>
            </li>
            <li class="active">Cập nhật</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cập nhật sản phẩm
                </div>

                <div class="panel-body">

                    @if ( $errors->any() )
                    <div class="alert bg-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                        <form class="form-horizontal" method="post" action="{{ url(route('news.store')) }}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="method" value="edit">
                            <input type="hidden" name="id" value="{{ $news->id }}">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Tên sản phẩm
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name"
                                               maxlength="50"
                                               value="{{ old('name', $news->name) }}"
                                               placeholder="Tên sản phẩm" class="form-control">
                                        <label class="color-red">
                                            {{--{{ error.name }}--}}
                                        </label>

                                    </div>
                                </div>

                                <!-- Description input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Mô tả ngắn
                                    </label>
                                    <div class="col-md-9">
                                    <textarea name="description"
                                              maxlength="255"
                                              class="form-control">{{ old('description', $news->description) }}</textarea>
                                        <label class="color-red">
                                            {{--{{ error.description }}--}}
                                        </label>

                                    </div>
                                </div>

                                <!-- Summary input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Mô tả chi tiết
                                    </label>
                                    <div class="col-md-9">
                                    <textarea name="summary"
                                              class="form-control ckeditor">{{ old('summary', $news->summary) }}</textarea>
                                        <label class="color-red">
                                            {{--{{ error.summary }}--}}
                                        </label>

                                    </div>
                                </div>

                                <!-- Summary input-->
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="name">--}}
                                        {{--Avatar--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<input type="file" name="avatar">--}}
                                        {{--@if($product->avatar)--}}
                                            {{--<img src="{{ url('/avatar/'.$product->avatar) }}" class="img-thumbnail"--}}
                                                 {{--style="width: 100px;height: 100px;"/>--}}
                                        {{--@endif--}}
                                        {{--<label class="color-red">--}}
                                            {{--{{ error.avatar }}--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <!-- Meta keyword -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Meta keyword
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="meta_keyword" id="meta_keyword"
                                               maxlength="100"
                                               value="{{ old('meta_keyword', $news->meta_keyword) }}"
                                               placeholder="Meta keyword" class="form-control">
                                        <label class="color-red">
                                            {{--{{ error.meta_keyword }}--}}
                                        </label>

                                    </div>
                                </div>

                                <!-- Meta description -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Meta description
                                    </label>
                                    <div class="col-md-9">
                                <textarea name="meta_description"
                                          class="form-control">{{ old('meta_description', $news->meta_description) }}</textarea>
                                        <label class="color-red">
                                            {{--{{ error.meta_description }}--}}
                                        </label>

                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 widget-right" style="text-align:right;">
                                        <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                        <button type="reset" class="btn btn-primary btn-md">Reset</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                </div>
            </div>
        </div>
    </div>

@endsection