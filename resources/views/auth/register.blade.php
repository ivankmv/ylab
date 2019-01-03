<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Регистрация | {{ config('app.site_title') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/plugins/iCheck/flat/blue.css') }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-box-body" style="padding-top: 2px;">
        <p class="login-box-msg">Регистрация</p>
        @if (count($errors)>0)
        <div class="alert alert-danger alert-dismissible" style="border-radius: 0;">
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
        @endif
        <form action="{{ url('/register') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="ФИО" required value="{{ old('name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Пароль (не менее 6 символов)" required value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Повтор пароля" required value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Зарегистрироваться</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12" >
                    <a href="{{ url('/') }}">на главную</a><a href="{{ url('/login') }}" class="pull-right">вход</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('assets/libs/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
