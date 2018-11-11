{{--admin part About content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-pagelines"></i> About</a></li>
            <li><a href="#"> About Us</a></li>
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($abouts)
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
                            <th>Текст</th>
                            <th>Фото</th>
                            <th>&nbsp;&nbsp;&nbsp;Действия&nbsp;&nbsp;&nbsp;</th>
                        </tr>

                        @foreach($abouts as $about)
                            <tr class="item{{$about->id}}">
                                <td>{{$about->id}}</td>
                                <td>
                                    <a href="{{ route('abouts.edit', ['id' => $about->id]) }}" title="Редактировать данные"> {{$about->title}} </a>
                                </td>
                                {{--<td>{{str_limit($about->description,400)}}</td>--}}
                                <td>{{$about->description}}</td>
                                <td>
                                    @if(isset($about->img))
                                        <img src="{{asset('mhost/img/locations/'.$about->img)}}" width="80" height="60" alt="image">
                                    @endif
                                </td>

                                <td>
                                    <form id="delete-form-{{ $about->id }}" class="delete-form" action="{{ route('abouts.destroy', ['id' => $about->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('abouts.edit', ['id' => $about->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{-- просто удалить через submit удаляется сразу, без всяких ? это самый 1-й рабочий вариант --}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}

                                            {{-- перед удалением вызывается обычный js confirm. вариант как-бы рабочий (лаконично но не симпатично?)--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                    if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $about->id }}').submit();
                                                    } else {
                                                    event.preventDefault();
                                                    }" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>

                                            {{--это не заработавший пока ...нада допилить--}}
                                            {{--onclick="javascript:deleteWithConfirm('{{$about->id}}')">--}}
                                            {{--<a href="" class="delete-button btn btn-danger btn-sm" title="Удалить данные"
                                                data-param="{{$about->id}}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>--}}

                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="box-footer">
                    <a href="{{route('abouts.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе About</p>
                    <a href="{{route('abouts.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>

{{--
<div class="modal modal-danger fade" id="your-sure-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Удаление данных</h4>
            </div>
            <div class="modal-body">
                <p>Вы уверены что хотите это удалить ? &hellip;&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-outline">Удалить</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
--}}

<div class="modal modal-danger" id="your-sure-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Подтвердите удаление</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Вы уверены что хотите это удалить ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"> Отмена </button>
                <!--<button type="submit" class="btn btn-outline"> Удалить </button>-->
                <button type="button" class="delete btn btn-outline"> Удалить </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    var urlDelete = '{{ route('abouts.destroy', $about->id) }}';
</script>


