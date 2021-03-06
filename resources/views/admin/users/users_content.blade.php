{{--admin part Our Team content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i>Users</a></li>
            {{--<li><a href="#"> Team</a></li>--}}
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($users)
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
                    <div class="col-md-9 col-md-offset-2">
                        <table class="table table-bordered table-striped " id="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>

                                @foreach($users as $user)
                                    <tr class="item{{$user->id}}">
                                        <td>{{$user->id}}</td>
                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" title="Редактировать пользователя"> {{$user->name}} </a>
                                        </td>
                                        <td>{{$user->email}}</td>

                                        <td>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', ['id' => $user->id]) }}" class="form-inline " method="POST">
                                                <div class="form-group">
                                                    {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}
                                                    <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                            if(confirm('Вы уверены, что хотите это удалить ?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $user->id }}').submit();
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

                </div>

                <div class="box-footer">
                    <a href="{{route('users.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе Team</p>
                    <a href="{{route('users.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>

