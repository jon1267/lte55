{{--admin part Our Team content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-pagelines"></i> About</a></li>
            <li><a href="#"> Team</a></li>
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($teams)
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
                            <th>Имя (ФИО)</th>
                            <th>Должность</th>
                            <th>Текст</th>
                            <th>Фото</th>
                            <th>&nbsp;&nbsp;&nbsp;Действия&nbsp;&nbsp;&nbsp;</th>
                        </tr>

                        @foreach($teams as $team)
                            <tr class="item{{$team->id}}">
                                <td>{{$team->id}}</td>
                                <td>
                                    <a href="{{ route('teams.edit', ['id' => $team->id]) }}" title="Редактировать данные"> {{$team->name}} </a>
                                </td>
                                {{--<td>{{str_limit($team->description,400)}}</td>--}}
                                <td>{{$team->position}}</td>
                                <td>{{$team->text}}</td>
                                <td>
                                    @if(isset($team->img))
                                        <img src="{{asset('mhost/img/team/'.$team->img)}}" width="80" height="80" alt="image">
                                    @endif
                                </td>

                                <td>
                                    <form id="delete-form-{{ $team->id }}" action="{{ route('teams.destroy', ['id' => $team->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('teams.edit', ['id' => $team->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $team->id }}').submit();
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
                    <a href="{{route('teams.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе Team</p>
                    <a href="{{route('teams.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>

