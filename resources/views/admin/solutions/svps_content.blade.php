{{--admin part Solutions Shared content (with pic) (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-briefcase"></i>Solutions</a></li>
            <li><a href="#">VPS Servers</a></li>
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($svps)
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

                        @foreach($svps as $svp)
                            <tr>
                                <td>{{$svp->id}}</td>
                                <td>
                                    <a href="{{ route('svps.edit', ['id' => $svp->id]) }}" title="Редактировать статью"> {{$svp->title}} </a>
                                </td>
                                <td>{{$svp->description}}</td>
                                <td>{{str_limit($svp->text, 300)}}</td>
                                {{--<td>{{$svp->text}}</td>--}}
                                <td>
                                    @if(isset($svp->img))
                                        <img src="{{asset('mhost/img/servers/'.$svp->img)}}" width="80" height="60" alt="image">
                                    @endif
                                </td>

                                <td>
                                    <form id="delete-form-{{ $svp->id }}" class="delete-form" action="{{ route('svps.destroy', ['id' => $svp->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('svps.edit', ['id' => $svp->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{-- просто удалить через submit удаляется сразу, без всяких ? это самый 1-й рабочий вариант --}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}

                                            {{-- перед удалением вызывается обычный js confirm. вариант как-бы рабочий (лаконично но не симпатично?)--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                    if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $svp->id }}').submit();
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
                    <a href="{{route('svps.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе </p>
                    <a href="{{route('svps.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>
