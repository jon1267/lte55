{{--admin part Main slider content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($mslider->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Home Pages</a></li>
            <li><a href="#">Main Slider</a></li>
            <li class="active"> {{ (isset($mslider->id) ? 'Update' : 'Create') }}</li>
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
                <!-- тут осн. тело содержимого enctype="multipart/form-data" -->
                <form action="{{(isset($mslider->id)) ? route('msliders.update', ['msliders' => $mslider->id]) : route('msliders.store') }}" method="post" >
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"><small>Заголовок</small></label>
                                <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок слайдера"
                                       value="{{(isset($mslider->title)) ? $mslider->title : old('title')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"><small>Подзаголовок</small></label>
                                <input class="form-control" type="text" id="description" name="description" placeholder="Подзаголовок слайдера"
                                       value="{{(isset($mslider->description)) ? $mslider->description : old('description')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p1"><small>Строка 1</small></label>
                                <input class="form-control" type="text" id="p1" name="p1" placeholder="Строка 1 слайдера"
                                       value="{{(isset($mslider->p1)) ? $mslider->p1 : old('p1')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p2"><small>Строка 2</small></label>
                                <input class="form-control" type="text" id="p2" name="p2" placeholder="Строка 2 слайдера"
                                       value="{{(isset($mslider->p2)) ? $mslider->p2 : old('p2')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p3"><small>Строка 3</small></label>
                                <input class="form-control" type="text" id="p3" name="p3" placeholder="Строка 3 слайдера"
                                       value="{{(isset($mslider->p3)) ? $mslider->p3 : old('p3')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p4"><small>Строка 4</small></label>
                                <input class="form-control" type="text" id="p4" name="p4" placeholder="Строка 4 слайдера"
                                       value="{{(isset($mslider->p4)) ? $mslider->p4 : old('p4')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p5"><small>Период</small></label>
                                <input class="form-control" type="text" id="p5" name="p5" placeholder="Период для цены"
                                       value="{{(isset($mslider->p5)) ? $mslider->p5 : old('p5')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"><small>Цена</small></label>
                                <input class="form-control" type="text" id="price" name="price" placeholder="цена на слайдере"
                                       value="{{(isset($mslider->price)) ? $mslider->price : old('price')}}">
                            </div>
                        </div>

                    </div>

                    @if(isset($mslider->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('msliders.index') }}" id="create-content-cancel-btn" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>

{{--<script>
    CKEDITOR.replace( 'text', {
        height: 100
    });
</script>--}}

