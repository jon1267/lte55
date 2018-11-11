{{--admin part Gray strip content (одна вьюха на добавление и обновление  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($team->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-pagelines"></i>Home Pages</a></li>
            <li><a href="#">Article</a></li>
            <li class="active"> {{ (isset($gray->id)) ? 'Update' : 'Create' }}</li>
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
                <form action="{{(isset($gray->id)) ? route('grays.update', ['grays' => $gray->id]) : route('grays.store') }}" method="post" >
                    {{ csrf_field() }}


                            <div class="form-group">
                                <label for="title"><small>Заголовок</small></label>
                                <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок"
                                       value="{{(isset($gray->title)) ? $gray->title : old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="text"><small>Текст</small></label>
                                <textarea class="form-control" name="text" id="text" placeholder="Текст"
                                          rows="4">{{(isset($gray->text)) ? $gray->text : old('text')}}</textarea>
                            </div>


                    @if(isset($gray->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('grays.index') }}" id="create-content-cancel-btn" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>

<script>
    CKEDITOR.replace( 'text', {
        height: 150
    });
</script>

