{{-- это универсальная вьюха и на создание и на обновление записией Contact  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($team->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-star-half-o"></i>Contact</a></li>
            {{--<li><a href="#">Home1 Slider</a></li>--}}
            <li class="active"> {{ (isset($contact->id)) ? 'Update' : 'Create' }}</li>
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
                <form action="{{(isset($contact->id)) ? route('contacts.update', ['contacts' => $contact->id]) : route('contacts.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="title"><small>City</small></label>
                            <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок статьи"
                                   value="{{(isset($contact->title)) ? $contact->title : old('title')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="p1"><small>Line 1</small></label>
                            <input class="form-control" type="text" id="p1" name="p1" placeholder="Строка 1 адреса"
                                   value="{{(isset($contact->p1)) ? $contact->p1: old('p1')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="p2"><small>Line 2</small></label>
                            <input class="form-control" type="text" id="p2" name="p2" placeholder="Строка 2 адреса"
                                   value="{{(isset($contact->p2)) ? $contact->p2: old('p2')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="p3"><small>Line 3</small></label>
                            <input class="form-control" type="text" id="p3" name="p3" placeholder="Строка 2 адреса"
                                   value="{{(isset($contact->p3)) ? $contact->p3: old('p3')}}">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="description"><small>Text</small></label>
                            <textarea class="form-control" name="description" id="description" placeholder="Полный текст статьи"
                            rows="2">{{(isset($contact->description)) ? $contact->description : old('description')}}</textarea>
                        </div>

                        @if(isset($contact->id) && (mb_strlen($contact->img) != 0 ))
                            <div class="form-group col-md-12">
                                <label for="old_img"><small>Старое изображение</small></label>
                                <div><img id="old_img" src="{{asset('mhost/img/locations/'.$contact->img)}}" width="180" height="120" alt="&nbsp;"></div>
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

                    @if(isset($contact->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
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
