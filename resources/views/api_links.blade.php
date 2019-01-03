<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>API</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylish-portfolio.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-2 main-text">
                    <strong>Frontend API</strong><br>

                    <p>
                    1. Просмотр списка задач с возможностью фильтрации по всем полям кроме
                    описания <br>

                        GET /api/tasks/{field}, где field - вариант из списка: id, name, created_at, updated_at, end_time, status_id
                    </p>
                    <p>
                        2. Просмотр одной задачи по идентификатору <br>

                        GET /api/task/{id}
                    </p>
                    <p>
                        3. Смена статуса задачи <br>

                        PUT /api/task/{task_id}/status/{status_id}
                    </p>


                    <hr>
                    <a href="{{ url('/') }}" class="btn btn-dark btn-lg">на главную</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
