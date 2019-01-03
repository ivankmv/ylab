<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Вход | {{ config('app.site_title') }}</title>
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
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body">
        <form action="{{ url('/login') }}" method="post" role="form">
            @if (count($errors)>0)
                <div class="alert alert-danger alert-dismissible" style="border-radius: 0;">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input required type="email" name="email" class="form-control" placeholder="Email" value="{{ old('login','admin@admin.com') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input required type="password" name="password" class="form-control" placeholder="Пароль" value="admin">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Вход</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-center">
                    <a href="{{ url('/') }}">на главную</a>
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
