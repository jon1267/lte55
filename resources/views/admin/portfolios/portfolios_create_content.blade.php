{{-- это универсальная вьюха и на создание и на обновление записией Portfolio  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($team->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-coffee"></i>Portfolio</a></li>
            {{--<li><a href="#">Home1 Slider</a></li>--}}
            <li class="active"> {{ (isset($portfolio->id)) ? 'Update' : 'Create' }}</li>
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
                <form action="{{(isset($portfolio->id)) ? route('portfolios.update', ['portfolios' => $portfolio->id]) : route('portfolios.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="title"><small>Заголовок</small></label>
                            <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок материала"
                                   value="{{(isset($portfolio->title)) ? $portfolio->title : old('title')}}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description"><small>Подзаголовок</small></label>
                            <input class="form-control" type="text" id="description" name="description" placeholder="Подзаголовок"
                                   value="{{(isset($portfolio->description)) ? $portfolio->description : old('description')}}">
                        </div>

                        @if(isset($portfolio->id) && (mb_strlen($portfolio->img) != 0 ))
                            <div class="form-group col-md-12">
                                <label for="old_img"><small>Старое изображение</small></label>
                                <div><img id="old_img" src="{{asset('mhost/img/works/'.$portfolio->img)}}" width="240" height="160" alt="&nbsp;"></div>
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

                    @if(isset($portfolio->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('portfolios.index') }}" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>

{{--
<script>
    CKEDITOR.replace( 'description', {
        height: 100
    });
</script>--}}
