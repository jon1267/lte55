{{--admin part Our Team content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($team->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-pagelines"></i> About</a></li>
            <li><a href="#"> Team</a></li>
            <li class="active"> {{ (isset($team->id)) ? 'Update' : 'Create' }}</li>
        </ol>
    </section>

    <section class="content">
        <!--<div class="box box-primary">-->
        @if(count($errors))
            <div class="alert alert-danger" role="alert">
            <!--<div class="error">раздражают цвета алертов- закомить стр выше,ниже оставит эту-->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul> {{--style="list-style: none;text-align: center;"--}}
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>-->
                </div>

            </div>

            <div class="box-body">
                <!-- тут осн. тело содержимого -->
                <form action="{{(isset($team->id)) ? route('teams.update', ['teams' => $team->id]) : route('teams.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><small>Имя (ФИО)</small></label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Имя (Фамилия Имя Отчество)"
                                   value="{{(isset($team->name)) ? $team->name : old('name')}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position"><small>Должность</small></label>
                            <input class="form-control" type="text" id="position" name="position" placeholder="Должностные обязанности"
                                   value="{{(isset($team->position)) ? $team->position : old('position')}}">
                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="text"><small>Текст</small></label>
                        <textarea class="form-control" name="text" id="text" placeholder="Должностные обязанности"
                        rows="4">{{(isset($team->text)) ? $team->text : old('text')}}</textarea>
                    </div>
                    </div>

                    @if(isset($team->id) && (mb_strlen($team->img) != 0 ))
                        <div class="form-group col-md-12">
                            <label for="old_img"><small>Старое изображение</small></label>
                            <div><img id="old_img" src="{{asset('mhost/img/team/'.$team->img)}}" width="150" height="150" alt="&nbsp;"></div>
                        </div>
                    @endif


                        <div class="form-group col-md-6 col-xs-8">
                            <label for="img">
                                <small>Изображение</small>
                            </label>
                            <input type="file" name="img" id="img" class="filestyle"
                                   data-buttonText="&nbsp;&nbsp;Выбор изображения" data-buttonName="btn-primary"
                                   data-placeholder="Файла нет">
                        </div>

                    </div>

                    @if(isset($team->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('teams.index') }}" id="create-content-cancel-btn" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>

{{--Все работает. Закоментил шоб юзеру не пхались теги типа <p> видимые на фронте--}}
{{--<script>
    CKEDITOR.replace( 'text', {
        height: 100
    });
</script>--}}

