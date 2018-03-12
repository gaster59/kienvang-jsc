@extends('layouts.admin.login')

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
@endsection

@section('content')
    <form method="post" action="{{ url(route('login.user')) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        <fieldset>
            <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email"
                       type="text" autofocus="">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password"
                       name="password" type="password" value="">
            </div>

            <input type="submit" class="btn btn-primary" value="Login">
        </fieldset>
    </form>
@endsection