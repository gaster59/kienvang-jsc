@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">
                <a href="{{ url('admin/useradmin') }}">
                    User admin
                </a>
            </li>
            <li class="active">Thêm</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User admin</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thêm user quản lý
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

                    <form class="form-horizontal" method="post" action="{{ url(route('user.store')) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="method" value="add">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Tên
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="name" id="name"
                                           maxlength="50"
                                           value="{{ old('name') }}" class="form-control">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Email
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="email" id="meta_keyword"
                                           maxlength="100"
                                           value="{{ old('email') }}"
                                           placeholder="Email" class="form-control">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Mật khẩu
                                </label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">
                                    Nhập lại Mật khẩu
                                </label>
                                <div class="col-md-9">
                                    <input type="password" name="password_confirmation" class="form-control">

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