{{-- это универсальная вьюха и на создание и на обновление записией Promotions  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($team->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-fire"></i>Promotions</a></li>
            {{--<li><a href="#">Home1 Slider</a></li>--}}
            <li class="active"> {{ (isset($promotion->id)) ? 'Update' : 'Create' }}</li>
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
                <form action="{{(isset($promotion->id)) ? route('promotions.update', ['promotions' => $promotion->id]) : route('promotions.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="title"><small>Заголовок</small></label>
                            <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок"
                                   value="{{(isset($promotion->title)) ? $promotion->title : old('title')}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="p1"><small>Подзаголовок 1</small></label>
                            <input class="form-control" type="text" id="p1" name="p1" placeholder="Подзаголовок 1"
                                   value="{{(isset($promotion->p1)) ? $promotion->p1: old('p1')}}">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="t1"><small>Текст 1</small></label>
                            <input class="form-control" type="text" id="t1" name="t1" placeholder="Текст 1"
                                   value="{{(isset($promotion->t1)) ? $promotion->t1: old('t1')}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="p2"><small>Подзаголовок 2</small></label>
                            <input class="form-control" type="text" id="p2" name="p2" placeholder="Подзаголовок 2"
                                   value="{{(isset($promotion->p2)) ? $promotion->p2: old('p2')}}">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="t2"><small>Текст 2</small></label>
                            <input class="form-control" type="text" id="t2" name="t2" placeholder="Текст 2"
                                   value="{{(isset($promotion->t2)) ? $promotion->t2: old('t2')}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="p3"><small>Подзаголовок 3</small></label>
                            <input class="form-control" type="text" id="p3" name="p3" placeholder="Подзаголовок 3"
                                   value="{{(isset($promotion->p3)) ? $promotion->p3: old('p3')}}">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="t3"><small>Текст 3</small></label>
                            <input class="form-control" type="text" id="t3" name="t3" placeholder="Текст 3"
                                   value="{{(isset($promotion->t3)) ? $promotion->t3: old('t3')}}">
                        </div>

                    </div>

                    @if(isset($promotion->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('promotions.index') }}" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>

