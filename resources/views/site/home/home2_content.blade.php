<section class="info_content gray shadows borders">
    <div class=" paddings">
        <div class="container wow  animated">
            @forelse($homes as $home)
                <div class="row">
                    <div class="col-md-8">
                        <h2>{{ $home->title }}</h2>
                        <div class="text_resalted">
                            <h3>
                                <p>
                                    {{ $home->description }}
                                </p>
                            </h3>
                        </div>
                        <p>
                            {!! $home->text !!}
                        </p>
                    </div>
                    <div class="col-md-4 padding_top">
                        <img src="{{ asset('mhost/img/servers/'.$home->img) }}" alt="image" class="img-responsive">
                    </div>
                </div>
                @if(($loop->count>1) && (!$loop->last))
                    <div class="divider"></div>
                @endif
            @empty
                <div class="row">
                    <p>No data for display</p>
                </div>
            @endforelse
        </div>
    </div>
</section>