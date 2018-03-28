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
                <a href="{{ url('admin/user') }}">
                    Thông tin user
                </a>
            </li>
            <li class="active">Xem chi tiết thông tin user</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thông tin
                </div>

                <div class="panel-body">

                    <form class="form-horizontal" method="post" action=""
                        enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Tiêu đề
                                </label>
                                <div class="col-md-9">
                                <input class="form-control" maxlength="100" type="text" name="title" value="{{ old('title') }}">

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
                                          class="form-control">{{ old('description') }}</textarea>
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
                                        <option @if (1 == old('type')) {!!"selected"!!} @endif value="1">Slider</option>
                                        <option @if (2 == old('type')) {!!"selected"!!} @endif value="2">Banner Main</option>
                                        <option @if (3 == old('type')) {!!"selected"!!} @endif value="3">Banner Footer</option>
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