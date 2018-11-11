{{--admin part SEO pages content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($seop->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bell"></i> SEO pages</a></li>
            <li><a href="#"> Content</a></li>
            <li class="active"> {{ (isset($seop->id) ? 'Update' : 'Create') }}</li>
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
                <form action="{{(isset($seop->id)) ? route('seops.update', ['seops' => $seop->id]) : route('seops.store') }}" method="post" >
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page"><small>Page</small></label>
                                <input class="form-control" type="text" id="page" name="page" placeholder="Страница привязки SEO"
                                value="{{(isset($seop->page)) ? $seop->page : old('page')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug"><small>Slug</small></label>
                                <input class="form-control" type="text" id="slug" name="slug" placeholder="алиас страницы"
                                value="{{(isset($seop->slug)) ? $seop->slug : old('slug')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"><small>Title</small></label>
                                <input class="form-control" type="text" id="title" name="title" placeholder="title страницы"
                                value="{{(isset($seop->title)) ? $seop->title : old('title')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h1"><small> H1 </small></label>
                                <input class="form-control" type="text" id="h1" name="h1" placeholder="тэг H1 страницы"
                                value="{{(isset($seop->h1)) ? $seop->h1 : old('h1')}}">
                            </div>
                        </div>

                        {{--<div class="form-group">
                            <label for="meta-description"><small>meta-description</small></label>
                            <input class="form-control" type="text" name="meta_description" id="meta_description" placeholder="meta_description"
                            value="{{(isset($seop->meta_description)) ? $seop->meta_description : old('meta_description')}}">
                        </div>--}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta-description"><small>meta-description</small></label>
                                <textarea class="form-control" name="meta_description" id="meta_description" placeholder="meta_description"
                                rows="3">{{(isset($seop->meta_description)) ? trim($seop->meta_description) : old('meta_description')}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_keywords"><small>meta-keywords</small></label>
                                <textarea class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta_keywords"
                                rows="6">{{(isset($seop->meta_keywords)) ? trim($seop->meta_keywords) : old('meta_keywords')}}</textarea>
                            </div>
                        </div>

                    </div>

                    @if(isset($seop->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('seops.index') }}" id="create-content-cancel-btn" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
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

