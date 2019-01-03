@extends('admin._template')

@section('title', 'Редактирование задачи')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('content_header')
    <section class="content-header">
        <h1>Задача № {{ $task->id }}</h1>
    </section>
@endsection

@section('content_body')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box_">
                    @if($statuses->count())
                        <form role="form" action="" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                @if (count($errors)>0)
                                    <div id="error_profile" class="alert alert-danger alert-dismissible" style="border-radius: 0;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
                                    <label>Название задачи</label>
                                    <input type="text" required name="name" class="form-control" placeholder="" value="{{ old('name', $task->name) }}">
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                    <select name="status_id" class="form-control">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" @if(old('status_id', ''.$task->status_id) === ''.$status->id) selected @endif>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dates">Дата и время выполнения</label>
                                    <div class="input-group col-md-12 col-lg-12">
                                        <input  type="text" required class="form-control" name="end_time" id="end_time" placeholder="">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Описание</label>
                                    <textarea required class="form-control" id="description" rows="50" name="description">{!! old('description', $task->description) !!}</textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    @else
                        <div id="error_profile" class="alert alert-danger alert-dismissible" style="border-radius: 0;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Статусы задачи не найдены
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="{{ asset('assets/libs/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/libs/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(function () {

        var startDate = moment().startOf('hour').add(1, 'hour');

        @if(old('end_time', $task->end_time))
            startDate = "{{ old('end_time', $task->end_time->format('d.m.Y H:i')) }}";
        @endif

        $('#end_time').daterangepicker(
            {
                "singleDatePicker": true,
                "showDropdowns": true,
                "timePicker": true,
                "timePicker24Hour": true,
                startDate: startDate,
                "locale": {
                    "format": "DD.MM.YYYY HH:mm",
                    "separator": " - ",
                    "applyLabel": "Сохранить",
                    "cancelLabel": "Отмена",
                    "fromLabel": "От",
                    "toLabel": "До",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Вс","Пн","Вт","Ср","Чт","Пт","Сб"
                    ],
                    "monthNames": [
                        "Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь",
                        "Ноябрь","Декабрь"
                    ],
                    "firstDay": 1
                },
                "opens": "left"
            }
        );

        CKEDITOR.replace('description', {
            language: 'ru',
            toolbarGroups: [
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others', groups: [ 'others' ] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons:  'Cut,Scayt,Link,Unlink,Anchor,Copy,Paste,PasteText,PasteFromWord,Image,HorizontalRule,SpecialChar,RemoveFormat,Outdent,Indent,Blockquote,Styles,About,Format',
            skin: 'moono-lisa',
            height: 200
        });
    });
</script>
@endsection