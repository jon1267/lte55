{{--admin part Promotions (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-fire"></i>Promotions</a></li>
            {{--<li><a href="#">Home1 Slider</a></li>--}}
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($promotions)
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
                            <th>Подзаголовок1</th>
                            <th>Текст1</th>
                            <th>Подзаголовок2</th>
                            <th>Текст2</th>
                            <th>Подзаголовок3</th>
                            <th>Текст3</th>
                            <th>&nbsp;&nbsp;Действия&nbsp;&nbsp;</th>
                        </tr>

                        @foreach($promotions as $promotion)
                            <tr>
                                <td>{{$promotion->id}}</td>
                                <td>
                                    <a href="{{ route('promotions.edit', ['id' => $promotion->id]) }}" title="Редактировать тариф"> {{$promotion->title}} </a>
                                </td>
                                <td>{{ $promotion->p1 }}</td>
                                <td>{{ $promotion->t1 }}</td>
                                <td>{{ $promotion->p2 }}</td>
                                {{--<td>{{str_limit($promotion->text,200)}}</td>--}}
                                <td>{{ $promotion->t2 }}</td>
                                <td>{{ $promotion->p3 }}</td>
                                <td>{{ $promotion->t3 }}</td>
                                {{--<td>
                                    @if(isset($feature->img))
                                        <img src="{{asset('mhost/img/icons_features/'.$feature->img)}}" width="48" height="48" alt="image">
                                    @endif
                                </td>--}}

                                <td>
                                    <form id="delete-form-{{ $promotion->id }}" class="delete-form" action="{{ route('promotions.destroy', ['id' => $promotion->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('promotions.edit', ['id' => $promotion->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{-- просто удалить через submit удаляется сразу, без всяких ? это самый 1-й рабочий вариант --}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}

                                            {{-- перед удалением вызывается обычный js confirm. вариант как-бы рабочий (лаконично но не симпатично?)--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                    if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $promotion->id }}').submit();
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
                    <a href="{{route('promotions.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе Contact</p>
                    <a href="{{route('promotions.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>


