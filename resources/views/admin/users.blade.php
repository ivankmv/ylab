@extends('admin._template')

@section('title','Пользователи')

@section('content_header')
    <section class="content-header">
        <h1>Пользователи</h1>
    </section>
@endsection

@section('content_body')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm" role="button">Добавить пользователя</a>
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible" style="border-radius: 0; margin-top: 4px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                <div class="box_">
                    <div class="box-body" style="overflow-x: auto;">
                        {{ csrf_field() }}
                        @if(count($users)>0)
                        <table id="users1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-action">№</th>
                                    <th>Email</th>
                                    <th>Регистрация</th>
                                    <th>Статус</th>
                                    <th class="col-action"></th>
                                    <th class="col-action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->created_at->format('d.m.Y') }}</td>
                                        <td>@if($u->is_admin)<span class="label label-primary">@endif{{ $u->rus_type }}@if($u->is_admin)</span>@endif</td>
                                        <td><a class="btn btn-default btn-xs" href="@if($u->id !== $user->id){{ url('admin/user',[$u->id]) }}@elseif($user->is_admin){{url('admin/profile')}}@endif" role="button" data-toggle="tooltip" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                        <td>@if($u->id !== $user->id)<a class="btn btn-danger btn-xs" href="{{ url('admin/user/delete',[$u->id]) }}" role="button" data-toggle="tooltip" title="Удалить"><i class="fa fa-close"></i></a>@endif</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>№</th>
                                    <th>Email</th>
                                    <th>Регистрация</th>
                                    <th>Статус</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                            <p>Пользователи не найдены</p>
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
                    null,
                    null, null,
                    null,
                    {"orderable": false },
                    {"orderable": false },
                ],
                stateSave: true
            });
        });
    </script>
@endsection