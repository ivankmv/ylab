@extends('admin._template')

@section('title', 'Профиль')

@section('content_header')
    <section class="content-header">
        <h1>Профиль пользователя № {{ $u->id }}</h1>
    </section>
@endsection

@section('content_body')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box_">
                    <form role="form" id="form_profile" action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            @if (count($errors)>0)
                                <div id="error_profile" class="alert alert-danger alert-dismissible" style="border-radius: 0;">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible" style="border-radius: 0;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Статус</label>
                                <select name="is_admin" class="form-control">
                                    <option value="1" @if($u->is_admin) selected @endif>Администратор</option>
                                    <option value="0" @if(!$u->is_admin) selected @endif>Пользователь</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Дата регистрации</label>
                                <input type="text" disabled class="form-control" placeholder="" value="{{ $u->created_at->format('d.m.Y') }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" required name="email" class="form-control" placeholder="" value="{{ old('email',$u->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Новый пароль (не менее 6 символов)</label>
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password2">Повтор пароля</label>
                                <input id="password2" type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
					</form>
                </div>
            </div>
        </div>
    </section>
@endsection