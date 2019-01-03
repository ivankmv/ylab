@extends('admin._template')

@section('title','Задачи')

@section('content_header')
    <section class="content-header">
        <h1>Задачи</h1>
    </section>
@endsection

@section('content_body')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('admin.task.create') }}" class="btn btn-primary btn-sm" role="button">Добавить задачу</a>
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible" style="border-radius: 0; margin-top: 4px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                <div class="box_">
                    <div class="box-body" style="overflow-x: auto;">
                        {{ csrf_field() }}
                        @if(count($tasks)>0)
                        <table id="users1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-action">№</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Дата редактирования</th>
                                    <th>Дата выполнения</th>
                                    <th class="col-action"></th>
                                    <th class="col-action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->name }}</td>
                                        <td>{{ str_limit(strip_tags($t->description), 200) }}</td>
                                        <td>{{ $t->status->name }}</td>
                                        <td>{{ $t->created_at->format('d.m.Y H:i') }}</td>
                                        <td>{{ $t->updated_at->format('d.m.Y H:i') }}</td>
                                        <td>{{ $t->end_time->format('d.m.Y H:i') }}</td>
                                        <td><a class="btn btn-default btn-xs" href="{{ url('admin/task',[$t->id]) }}" role="button" data-toggle="tooltip" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                        <td><a class="btn btn-danger btn-xs" href="{{ url('admin/task/delete',[$t->id]) }}" role="button" data-toggle="tooltip" title="Удалить"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="col-action">№</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Дата редактирования</th>
                                    <th>Дата завершения</th>
                                    <th class="col-action"></th>
                                    <th class="col-action"></th>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                            <p>Задачи не найдены</p>
                        @endif
                    </div>
                </div>
                </div>
            </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/libs/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/plugins/datetime-moment.js') }}"></script>
    <script>
        $(function () {
            $.fn.dataTable.moment('DD.MM.YYYY');
            $("#users1").DataTable({
                "columns": [
                    null, null,
                    null, null,
                    null, null, null,
                    {"orderable": false },
                    {"orderable": false },
                ],
                stateSave: true
            });
        });
    </script>
@endsection