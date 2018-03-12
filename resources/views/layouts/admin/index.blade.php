<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        @section('css_path')
            <link rel="stylesheet" href="{{ "/admin/css/bootstrap.min.css" }}"/>
            <link rel="stylesheet" href="{{ "/admin/css/styles.css" }}"/>
{{--            <link rel="stylesheet" href="{{ "/admin/css/loader.css" }}"/>--}}
        @show

        @section('js_path')
            <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->

            <script type="text/javascript"
                    src="{{ "/admin/js/lumino.glyphs.js" }}">
            </script>
            <script type="text/javascript"
                    src="{{ "/admin/js/jquery-1.11.1.min.js" }}">
            </script>
            <script type="text/javascript"
                    src="{{ "/admin/js/bootstrap.min.js" }}">
            </script>
            <script type="text/javascript"
                    src="{{ "/admin/js/bootstrap-datepicker.js" }}">
            </script>
            <script type="text/javascript"
                    src="{{ "/admin/js/loadingoverlay.min.js" }}">
            </script>
            <script type="text/javascript"
                    src="{{ "/admin/js/bootstrap-notify.min.js" }}">
            </script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
        @show
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <span>KIẾN VÀNG - JSC</span>
                    </a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg> {{ \Illuminate\Support\Facades\Auth::user()['name'] }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">
                                        <svg class="glyph stroked male-user">
                                            <use xlink:href="#stroked-male-user"></use>
                                        </svg> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="glyph stroked gear">
                                            <use xlink:href="#stroked-gear"></use>
                                        </svg> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        <svg class="glyph stroked cancel">
                                            <use xlink:href="#stroked-cancel"></use>
                                        </svg> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @section('sidebar')
            @include('layouts.admin.partial.sidebar')
        @show
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            @yield('content')
        </div>
        <div class="loader"></div>
    </body>

</html>