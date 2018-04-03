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
                <a href="{{ url('admin/job') }}">
                    Việc làm
                </a>
            </li>
            <li class="active">Cập nhật</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Việc làm</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cập nhật việc làm
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

                        <form class="form-horizontal" method="post" action="{{ url(route('job.store')) }}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="method" value="edit">
                            <input type="hidden" name="id" value="{{ $job->id }}">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Tên việc làm
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name"
                                               maxlength="50"
                                               value="{{ old('name', $job->name) }}"
                                               placeholder="Tên việc làm" class="form-control">
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
                                              class="form-control">{{ old('description', $job->description) }}</textarea>
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
                                              class="form-control ckeditor">{{ old('summary', $job->summary) }}</textarea>
                                        <label class="color-red">
                                            {{--{{ error.summary }}--}}
                                        </label>

                                    </div>
                                </div>

                                <!-- Company input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Công ty
                                    </label>
                                    <div class="col-md-9">
                                        <select name="company_id">
                                            @foreach($companies as $item)
                                                @php
                                                    $selected = ''
                                                @endphp
                                                @if ($item->id == old('company_id', $job->company_id))
                                                    @php
                                                        $selected = 'selected'
                                                    @endphp
                                                @endif
                                                <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="color-red">
                                            {{--{{ error.company_id }}--}}
                                        </label>
                                    </div>
                                </div>

                                <!-- Major input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Ngành nghề
                                    </label>
                                    <div class="col-md-9">
                                        <select name="major_id">
                                            @foreach($majors as $item)
                                                @php
                                                    $selected = ''
                                                @endphp
                                                @if ($item->id == old('major_id', $job->major_id))
                                                    @php
                                                        $selected = 'selected'
                                                    @endphp
                                                @endif
                                                <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="color-red">
                                            {{--{{ error.major_id }}--}}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Danh mục
                                    </label>
                                    <div class="col-md-9">
                                        <select name="category_id">
                                            @foreach($category as $item)
                                                @php
                                                    $selected = ''
                                                @endphp
                                                @if ($item->id == old('category_id', $job->category_id))
                                                    @php
                                                        $selected = 'selected'
                                                    @endphp
                                                @endif
                                                <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
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
                                               value="{{ old('meta_keyword', $job->meta_keyword) }}"
                                               placeholder="" class="form-control">
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
                                              class="form-control">{{ old('meta_description', $job->meta_description) }}</textarea>
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