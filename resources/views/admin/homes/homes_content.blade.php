{{--admin part Home2 content (article with pic) (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Home Pages</a></li>
            <li><a href="#">Home2 Article</a></li>
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($homes)
            {{--<div class="box box-primary">--}}
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>--}}
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped " id="table">
                        <tr>
                            <th>ID</th>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Текст</th>
                            <th>Картинка</th>
                            <th>&nbsp;&nbsp;&nbsp;Действия&nbsp;&nbsp;&nbsp;</th>
                        </tr>

                        @foreach($homes as $home)
                            <tr>
                                <td>{{$home->id}}</td>
                                <td>
                                    <a href="{{ route('homes.edit', ['id' => $home->id]) }}" title="Редактировать статью"> {{$home->title}} </a>
                                </td>
                                <td>{{$home->description}}</td>
                                <td>{{str_limit($home->text, 300)}}</td>
                                {{--<td>{{$home->text}}</td>--}}
                                <td>
                                    @if(isset($home->img))
                                        <img src="{{asset('mhost/img/servers/'.$home->img)}}" width="80" height="60" alt="image">
                                    @endif
                                </td>

                                <td>
                                    <form id="delete-form-{{ $home->id }}" class="delete-form" action="{{ route('homes.destroy', ['id' => $home->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('homes.edit', ['id' => $home->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{-- просто удалить через submit удаляется сразу, без всяких ? это самый 1-й рабочий вариант --}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}

                                            {{-- перед удалением вызывается обычный js confirm. вариант как-бы рабочий (лаконично но не симпатично?)--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                    if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $home->id }}').submit();
                                                    } else {
                                                    event.preventDefault();
                                                    }" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="box-footer">
                    <a href="{{route('homes.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе </p>
                    <a href="{{route('homes.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>
