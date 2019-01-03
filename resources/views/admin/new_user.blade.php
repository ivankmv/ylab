@extends('admin._template')

@section('title', 'Новый пользователь')

@section('content_header')
    <section class="content-header">
        <h1>Новый пользователь</h1>
    </section>
@endsection

@section('content_body')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box_">
                    <form role="form" action="" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            @if (count($errors)>0)
                                <div id="error_profile" class="alert alert-danger alert-dismissible" style="border-radius: 0;">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if(session('msg'))
                                <div class="alert alert-success alert-dismissible" style="border-radius: 0;">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Статус</label>
                                <select name="is_admin" class="form-control">
                                    <option value="1" @if(old('is_admin') === '1') selected @endif>Администратор</option>
                                    <option value="0" @if(old('is_admin') === '0') selected @endif>Пользователь</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" required name="email" class="form-control" placeholder="" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль (не менее 6 символов)</label>
                                <input id="password" type="password" required name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password2">Повтор пароля</label>
                                <input id="password2" type="password" required name="password_confirmation" class="form-control">
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