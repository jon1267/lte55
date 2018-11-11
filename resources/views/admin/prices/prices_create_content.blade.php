{{--admin part Prices content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($price->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Home Pages</a></li>
            <li><a href="#">Prices</a></li>
            <li class="active"> {{ (isset($price->id) ? 'Update' : 'Create') }}</li>
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
                <form action="{{(isset($price->id)) ? route('prices.update', ['prices' => $price->id]) : route('prices.store') }}" method="post" >
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"><small>Заголовок</small></label>
                                <input class="form-control" type="text" id="title" name="title" placeholder="Название тарифного плана"
                                       value="{{(isset($price->title)) ? $price->title : old('title')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="yearly"><small>Цена за год</small></label>
                                <input class="form-control" type="text" id="yearly" name="yearly" placeholder="Альтернативная цена как строка например: $150 в год"
                                       value="{{(isset($price->yearly)) ? $price->yearly : old('yearly')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"><small>Цена</small></label>
                                <input class="form-control" type="text" id="price" name="price" placeholder="Основная цена в тарифном плане (число)"
                                       value="{{(isset($price->price)) ? $price->price : old('price')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mo"><small>За период</small></label>
                                <input class="form-control" type="text" id="mo" name="mo" placeholder="Период действия основной цены например: в месяц"
                                       value="{{(isset($price->mo)) ? $price->mo : old('mo')}}">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hdd"><small>HDD</small></label>
                                <input class="form-control" type="text" id="hdd" name="hdd" placeholder="Объем HDD в тарифном плане"
                                       value="{{(isset($price->hdd)) ? $price->hdd : old('hdd')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bandwidth"><small>Трафик</small></label>
                                <input class="form-control" type="text" id="bandwidth" name="bandwidth" placeholder="Трафик в тарифном плане"
                                       value="{{(isset($price->bandwidth)) ? $price->bandwidth : old('bandwidth')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ram"><small>RAM</small></label>
                                <input class="form-control" type="text" id="ram" name="ram" placeholder="Объем ОЗУ в тарифном плане"
                                       value="{{(isset($price->ram)) ? $price->ram : old('ram')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ip"><small>выделенных IP</small></label>
                                <input class="form-control" type="text" id="ip" name="ip" placeholder="Выделенных IP в тарифном плане"
                                       value="{{(isset($price->ip)) ? $price->ip : old('ip')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpanel"><small>cPanel</small></label>
                                <input class="form-control" type="text" id="cpanel" name="cpanel" placeholder="Наличие отсутствие cPanel"
                                       value="{{(isset($price->cpanel)) ? $price->cpanel : old('cpanel')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="os"><small>Виртуализация</small></label>
                                <input class="form-control" type="text" id="os" name="os" placeholder="Виртуализация"
                                       value="{{(isset($price->os)) ? $price->os : old('os')}}">
                            </div>
                        </div>

                    </div>

                    @if(isset($price->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('prices.index') }}" id="create-content-cancel-btn" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
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

