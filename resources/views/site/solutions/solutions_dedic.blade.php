<!-- Content Info-->
<section class="info_content">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Row-->
        @forelse($sdedics as $sdedic)
            <div class="row">
                <div class="col-md-8">
                    <h2>{{ $sdedic->title }}</h2>
                    <div class="text_resalted">
                        <h3>{{ $sdedic->description }}</h3>
                    </div>
                    <p>{!! $sdedic->text !!}</p>
                </div>
                <div class="col-md-4 padding_top">
                    <img src="{{ asset('mhost/img/servers/'.$sdedic->img) }}" alt="" class="img-responsive">
                </div>
            </div>
            @if( ($loop->count>1) && (!$loop->last))
                <div class="divider"></div>
            @endif
        @empty
            <div class="row">
                <p>Нет данных для отображения</p>
            </div>
        @endforelse
        <!-- End Row-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Info-->