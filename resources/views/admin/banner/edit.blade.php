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
                <a href="{{ url('admin/banner') }}">
                    Banner
                </a>
            </li>
            <li class="active">Cập nhật</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Banner</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cập nhật banner
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

                        <form class="form-horizontal" method="post" action="{{ url(route('banner.store')) }}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="method" value="edit">
                            <input type="hidden" name="id" value="{{ $banner->id }}">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Tiêu đề
                                    </label>
                                    <div class="col-md-9">
                                    <input class="form-control" maxlength="100" type="text" name="title" value="{{ old('title', $banner->title) }}">

                                    </div>
                                </div>
                                <!-- Description input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Mô tả ngắn
                                    </label>
                                    <div class="col-md-9">
                                    <textarea name="description"
                                              maxlength="100"
                                              class="form-control">{{ old('description', $banner->description) }}</textarea>
                                        <label class="color-red">
                                            {{--{{ error.description }}--}}
                                        </label>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Tùy chọn
                                    </label>
                                    <div class="col-md-9">
                                        <select name="type" class="form-control">
                                            
                                            <option @if (1 == old('type', $banner->type)) {!!"selected"!!} @endif value="1">Slider</option>
                                            <option @if (2 == old('type', $banner->type)) {!!"selected"!!} @endif value="2">Banner Main</option>
                                            <option @if (3 == old('type', $banner->type)) {!!"selected"!!} @endif value="3">Banner Footer</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Summary input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Avatar
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="avatar">
                                        @if($banner->avatar)
                                            <img src="{{ url('/banner/'.$banner->avatar) }}" class="img-thumbnail"
                                                 style=""/>
                                        @endif
                                        <label class="color-red">
                                            {{--{{ error.avatar }}--}}
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