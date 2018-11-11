{{--admin part Price content (all content in table, add, edit, dele  --}}
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mega Host
            <small>site content edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Home Pages</a></li>
            <li><a href="#">Prices</a></li>
            <li class="active">Content</li>
        </ol>
    </section>

    <section class="content">
        <div>
            @include('admin.layouts.status_block')
        </div>

        @if($prices)
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
                            <th>Title</th>
                            <th>Price</th>
                            <th>Period</th>
                            <th>Yearly</th>
                            <th>HDD</th>
                            <th>Bandwidth</th>
                            <th>RAM</th>
                            <th>IP</th>
                            <th>cPanel</th>
                            <th>OS</th>
                            <th>&nbsp;&nbsp;&nbsp;ActionsOn&nbsp;&nbsp;&nbsp;</th>
                        </tr>

                        @foreach($prices as $price)
                            <tr>
                                <td>{{$price->id}}</td>
                                <td>
                                    <a href="{{ route('prices.edit', ['id' => $price->id]) }}" title="Редактировать тариф"> {{$price->title}} </a>
                                </td>
                                <td>{{ $price->price }}</td>
                                <td>{{ $price->mo }}</td>
                                <td>{{ $price->yearly }}</td>
                                {{--<td>{{str_limit($feature->text,200)}}</td>--}}
                                <td>{{ $price->hdd }}</td>
                                <td>{{ $price->bandwidth }}</td>
                                <td>{{ $price->ram }}</td>
                                <td>{{ $price->ip }}</td>
                                <td>{{ $price->cpanel }}</td>
                                <td>{{ $price->os }}</td>
                                {{--<td>
                                    @if(isset($price->img))
                                        <img src="{{asset('mhost/img/icons_features/'.$price->img)}}" width="48" height="48" alt="image">
                                    @endif
                                </td>--}}
                                <td>

                                    <form id="delete-form-{{ $price->id }}" action="{{ route('prices.destroy', ['id' => $price->id]) }}" class="form-inline " method="POST">
                                        <div class="form-group">
                                            {{-- ссылка независима, к форме не привязана, просто чтоб кнопы были в строку --}}
                                            <a href="{{ route('prices.edit', ['id' => $price->id]) }}" class="btn btn-primary btn-sm" title="Редактировать данные"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            {{--<button class="btn btn-danger btn-sm" title="Удалить данные" type="submit"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>--}}
                                            <a href="" class="btn btn-danger btn-sm" title="Удалить данные" onclick="
                                                    if(confirm('Вы уверены, что хотите это удалить ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $price->id }}').submit();
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
                    <a href="{{route('prices.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                    {{-- тут по идее не мож.б пагин но вдруг...)
                    <div class="pull-right">
                        {{ $prices->links() }}
                    </div>--}}
                </div>

            </div>
        @else
            <section class="content-header">
                <div class="box">
                    <p>Нет записей в разделе Main Slider</p>
                    <a href="{{route('prices.create')}}" class="btn btn-primary" title="Добавить новые данные"> <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Добавить данные </a>
                </div>
            </section>
        @endif
    </section>
</div>

