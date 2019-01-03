@extends('admin._template')

@section('title','Статусы задач')

@section('css')
@endsection

@section('content_header')
    <section class="content-header">
        <h1>Статусы задач</h1><br>
        <button id="btn_add" class="btn btn-primary btn-sm" role="button">Добавить статус</button>
        <a class="btn btn-danger btn-sm" id="btn_save_order" style="display:none;"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Сохранить порядок&nbsp;&nbsp;</a>
    </section>
@endsection

@section('content_body')
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible" id="message">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                @if(session()->has('errors'))
                    <div class="alert alert-error alert-dismissible" id="error">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('errors')->first() }}
                    </div>
                @endif

                <ul class="todo-list">
                    @if($statuses->count())
                        {{ csrf_field() }}
                        @foreach($statuses as $s)
                            <li style="margin-bottom: 10px; padding-top: 14px; padding-bottom: 14px;" id="{{  $s->id }}">
                              <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                              </span>
                                <span class="text">
                                    {{ $s->position }}. {{ $s->name }}
                                </span>
                                <div class="tools" style="display: block;">
                                    <a href="#" class="btn btn-default btn-xs edit_btn" data-id="{{ $s->id }}" data-name="{{ $s->name }}"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-default btn-xs" role="button" href="{{route('admin.status.delete',[$s->id])}}"
                                       data-toggle="tooltip" title="Удалить"><i class="fa fa-close"></i></a>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li>Статусы задач не найдены</li>
                    @endif
                </ul>

                <div style="height: 200px;"></div>
            </div>
        </div>
    </section>

    <div id="modal_add" class="modal fade" style="top: 15px;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="{{route('admin.status.store')}}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Новый статус</h4>
                    </div>
                    <div class="modal-body" style="padding-left: 40px; padding-right: 40px;">
                        <div class="form-group">
                            <input type="text" required name="name" class="form-control" placeholder="" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal_edit" class="modal fade" style="top: 15px;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="{{route('admin.status.update')}}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Изменение статуса</h4>
                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <div class="modal-body" style="padding-left: 40px; padding-right: 40px;">
                        <div class="form-group">
                            <input type="text" id="name" required name="name" class="form-control" placeholder="" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form id="order_form" name="order_form" method="post" action="{{route('admin.status.order')}}">
        <input type="hidden" name="order" value="" id="order">
        {{ csrf_field() }}
    </form>

@endsection

@section('js')
    <script>
        $(function () {

            $('#btn_add').click(function(){
                $('#modal_add').modal();
            });

            $('.edit_btn').click(function(){

                $('#id').val( $(this).attr('data-id') );
                $('#name').val( $(this).attr('data-name') );

                $('#modal_edit').modal();
            });

            $(".todo-list").sortable({
                placeholder: "sort-highlight",
                handle: ".handle",
                forcePlaceholderSize: true,
                zIndex: 999999
            }).sortable({
                update: function( event, ui ) {
                    $('#message').fadeOut();
                    $('#error').fadeOut();
                    $('#btn_save_order').show();
                }
            });

            $('body').on('click','#btn_save_order', function(){
                $('#order').val($(".todo-list").sortable("toArray").toString());
                $('#order_form').submit();
            });

        });
    </script>
@endsection