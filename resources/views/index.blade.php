<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Тестовое задание от YLab</title>
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
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li>
            <a href="#top" onclick=$("#menu-close").click();>Главная</a>
        </li>
        <li>
            <a href="#about" onclick=$("#menu-close").click();>Описание</a>
        </li>
        <li>
            <a href="{{ url('login') }}" onclick=$("#menu-close").click();>Вход</a>
        </li>
        <li>
            <a href="{{ url('api-links') }}" onclick=$("#menu-close").click();>Frontend API</a>
        </li>
    </ul>
</nav>
<header id="top" class="header">
    <div class="text-vertical-center">
        <div style="background-color: rgba(0,0,0,0.4); padding-top: 50px; padding-bottom: 50px;">
            <h1 style="color: #fffbe3">Тестовое задание от YLab</h1>
                <h3><a class="main-link" href="https://moikrug.ru/vacancies/1000047787" target="_blank">Junior PHP разработчик</a></h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Описание</a>
            <a href="{{ url('login') }}" class="btn btn-dark btn-lg" style="margin-left: 10px; margin-right: 10px;">Вход</a>
            <a href="{{ url('api-links') }}" class="btn btn-dark btn-lg">Frontend API</a>
        </div>
    </div>
</header>
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-2 main-text">
                Необходимо реализовать сервис управления задачами используя возможности любого
                фреймворка (yii, laravel, symfony).<br>
                Приложение должно состоять из 2-х частей:<br>
                1. Административная панель<br>
                2. Frontend API<br>
                <h4>Административная панель</h4>
                Должна быть защищена авторизацией и иметь интерфейс со следующими разделами:<br>
                1. Список задач<br>
                2. Просмотр/редактирование/добавление задачи<br>
                3. Удаление задачи<br>
                4. Список статусов<br>
                5. Просмотр/редактирование/добавление статусов<br>
                6. Удаление статусов<br>
                7. Список пользователей<br>
                8. Просмотре/редактирование/удаление пользователей<br><br>
                <strong>Список полей сущности «Задача»:</strong><br>
                1. Название - 255 символов<br>
                2. Описание - 4000 символов<br>
                3. Дата создания - дата/время<br>
                4. Дата редактирования - дата/время<br>
                5. Срок выполнения - дата/время<br>
                6. Статус - привязка к статусу<br><br>
                <strong>Список полей сущности «Статус»:</strong><br>
                1. Название - 255 символов<br>
                2. Сортировка - целое число<br>
                Реализация сущности «Пользователей» на усмотрение исполнителя.<br>
                Поле статус у задачи должно быть в виде выпадающего списка который заполняется
                из статусов созданных в разделе «Список статусов».<br>
                <h4>Frontend API</h4>
                Должно реализовывать следующие публичные(доступны без авторизации) методы:<br>
                1. Просмотр списка задач с возможностью фильтрации по всем полям кроме
                описания<br>
                2. Просмотр одной задачи по идентификатору<br>
                3. Смена статуса задачи<br>
                Расположение и наименование методов, формат ответа на усмотрение исполнителя
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <hr class="small">
                <p class="text-muted">&copy; 2019 Все права защищены</p>
            </div>
        </div>
    </div>
    <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
</footer>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
</script>
</body>
</html>
