{{--admin part Seo pages content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bell"></i> SEO pages</a></li>
            <!--<li><a href="#"> Accordion</a></li>-->
            <li class="active"> Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($seops)
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
                            <th>Page</th>
                            <th>Slug</th>
                            <th>Title</th>
                            <th>H1</th>
                            <th>meta-description</th>
                            <th>meta-keywords</th>
                            <th>&nbsp;&nbsp;ActionsOn&nbsp;&nbsp;</th>
                        </tr>

                        @foreach($seops as $seop)
                            <tr>
                                <td>{{$seop->id}}</td>
                                <td>
                                    <a href="{{ route('seops.edit', ['id' => $seop->id]) }}" title="Редактировать данные"> {{$seop->page}} </a>
                                </td>
                                <td>{{ $seop->slug }}</td>
                                <td>{{ $seop->title }}</td>
                                <td>{{ $seop->h1 }}</td>
                                <td>{{ $seop->meta_description }}</td>
                                <td>{{ str_limit($seop->meta_keywords,300) }}</td>
                                {{--<td>
                                    @if(isset($seop->img))
                                        <img src="{{asset('mhost/img/icons_features/'.$seop->img)}}" width="48" height="48" alt="image">
                                    @endif
                                </td>--}}
                                <td>

                                    <form id="delete-form-{{ $seop->id }}" action="{{ route('seops.destroy', ['id' => $seop->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('seops.edit', ['id' => $seop->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                    if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $seop->id }}').submit();
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
                    <a href="{{route('seops.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                    <div class="pull-right">
                        {{ $seops->links() }}
                    </div>
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе SEO pages</p>
                    <a href="{{route('seops.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>

