{{--admin part Features content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($team->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Home Pages</a></li>
            <li><a href="#">Features</a></li>
            <li class="active"> {{ (isset($feature->id)) ? 'Update' : 'Create' }}</li>
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
                <form action="{{(isset($feature->id)) ? route('features.update', ['features' => $feature->id]) : route('features.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="title"><small>Заголовок</small></label>
                            <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок"
                                   value="{{(isset($feature->title)) ? $feature->title : old('title')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="blue"><small>Подзаголовок</small></label>
                            <input class="form-control" type="text" id="blue" name="blue" placeholder="Подзаголовок"
                                   value="{{(isset($feature->blue)) ? $feature->blue : old('blue')}}">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="text"><small>Текст</small></label>
                            <textarea class="form-control" name="text" id="text" placeholder="Полный текст"
                                      rows="4">{{(isset($feature->text)) ? $feature->text : old('text')}}</textarea>
                        </div>

                        @if(isset($feature->id) && (mb_strlen($feature->img) != 0 ))
                            <div class="form-group col-md-12">
                                <label for="old_img"><small>Старое изображение</small></label>
                                <div><img id="old_img" src="{{asset('mhost/img/icons_features/'.$feature->img)}}" width="64" height="64" alt="&nbsp;"></div>
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

                    @if(isset($feature->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('features.index') }}" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>
{{-- тоже по дизайну, дб 1 абзац текста, цкэдитор убрал бо пхает html тэги...
если включать - то на фронтенде выводить так {!! $feature->text !!}
<script>
    CKEDITOR.replace( 'text', {
        height: 100
    });
</script>
--}}
