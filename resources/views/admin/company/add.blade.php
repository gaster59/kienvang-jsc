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
                <a href="{{ url('admin/company') }}">
                    Công ty
                </a>
            </li>
            <li class="active">Thêm</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Công ty</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thêm công ty
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

                    <form class="form-horizontal" method="post" action="{{ url(route('company.store')) }}"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="method" value="add">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Tên công ty
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="name" id="name"
                                           maxlength="100"
                                           value="{{ old('name') }}"
                                           placeholder="Tên công ty" class="form-control">
                                    <label class="color-red">
                                        {{--{{ error.name }}--}}
                                    </label>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="website">
                                    Website
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="website" id="website"
                                           maxlength="100"
                                           value="{{ old('website') }}"
                                           placeholder="Website" class="form-control">

                                </div>
                            </div>

                            <!-- Summary input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Mô tả chi tiết
                                </label>
                                <div class="col-md-9">
                                    <textarea name="summary"
                                        class="form-control ckeditor">{{ old('summary') }}</textarea>
                                    <label class="color-red">
                                        {{--{{ error.summary }}--}}
                                    </label>

                                </div>
                            </div>

                            <!-- Scale input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Quy mô công ty
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="scale" id="scale"
                                           maxlength="50"
                                           value="{{ old('scale') }}"
                                           placeholder="Quy mô công ty" class="form-control">
                                    <label class="color-red">
                                        {{--{{ error.scale}}--}}
                                    </label>

                                </div>
                            </div>

                            <!-- Scale input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Năm thành lập
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="founding" id="founding"
                                           maxlength="50"
                                           value="{{ old('founding') }}"
                                           placeholder="Năm thành lập" class="form-control">
                                    <label class="color-red">
                                        {{--{{ error.founding}}--}}
                                    </label>

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
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Tùy chọn
                                </label>
                                <div class="col-md-3">
                                    <select name="status" class="form-control">
                                        <option @if (1 == old('status')) {!!"selected"!!} @endif value="1">Hiện</option>
                                        <option @if (0 == old('status')) {!!"selected"!!} @endif value="0">Ẩn</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Show right banner
                                </label>
                                <div class="col-md-3">
                                    <select name="is_home" class="form-control">
                                        <option @if (1 == old('is_home')) {!!"selected"!!} @endif value="1">Hiện</option>
                                        <option @if (0 == old('is_home')) {!!"selected"!!} @endif value="0">Ẩn</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <!-- Meta keyword -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Meta keyword
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="meta_keyword" id="meta_keyword"
                                           maxlength="100"
                                           value="{{ old('meta_keyword') }}"
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
                                              class="form-control">{{ old('meta_description') }}</textarea>
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