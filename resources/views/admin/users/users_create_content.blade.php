{{--admin part Our Team content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
            {{--<strong>{{(isset($user->id) ? 'Редактирование данных раздела Team': 'Добавление данных в раздел Team')}}</strong> тут оно теряет смысл ... --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i>Users</a></li>
            {{--<li><a href="#">Users</a></li>--}}
            <li class="active"> {{ (isset($user->id)) ? 'Update' : 'Create' }}</li>
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
                <form action="{{(isset($user->id)) ? route('users.update', ['users' => $user->id]) : route('users.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">

                        <div class="form-group ">
                            <label for="name"><small>Имя пользователя</small></label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Имя пользователя"
                                   value="{{(isset($user->name)) ? $user->name : old('name')}}">
                        </div>

                        <div class="form-group ">
                            <label for="email"><small>Email</small></label>
                            <input class="form-control" type="text" id="email" name="email" placeholder="Email"
                                   value="{{(isset($user->email)) ? $user->email : old('email')}}">
                        </div>

                        <div class="form-group ">
                            <label for="password"><small>Пароль</small></label>
                            <input class="form-control" type="password" id="password" name="password">
                        </div>

                        <div class="form-group ">
                            <label for="password_confirmation"><small>Повтор пароля</small></label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                        </div>

                        </div>
                    </div>

                    @if(isset($user->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;Сохранить данные</button>
                        <a href="{{ route('users.index') }}" id="create-content-cancel-btn" class="btn btn-warning"> <i class="fa fa-undo" aria-hidden="true"></i> Отмена </a>
                    </div>
                </form>

            </div>

        </div>
    </section>
</div>


