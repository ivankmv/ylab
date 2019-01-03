<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('app.site_title') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/plugins/iCheck/flat/blue.css') }}">
    @section('css')
    @show
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini">{{ config('app.short_site_title') }}</span>
            <span class="logo-lg">{{ config('app.site_title') }}</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{ $user->email }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/admin/profile') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/out') }}" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header"></li>
                <li @if (Request::is("admin/tasks")) class="active" @endif>
                    <a href="{{ url("/admin/tasks") }}">
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span>Задачи</span>
                    </a>
                </li>
                <li @if (Request::is("admin/statuses")) class="active" @endif>
                    <a href="{{ url("/admin/statuses") }}">
                        <i class="glyphicon glyphicon-cog"></i>
                        <span>Статусы</span>
                    </a>
                </li>
                <li @if (Request::is("admin/users")) class="active" @endif>
                    <a href="{{ url("/admin/users") }}"><i class="fa fa-user"></i><span>Пользователи</span></a>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        @section('content_header')
        @show

        @section('content_body')
        @show
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Версия</b> 1.0.0
        </div>
        <strong>&copy; 2019</strong>
    </footer>
</div>

<script src="{{ asset('assets/libs/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
@section('js')
@show
</body>
</html>
