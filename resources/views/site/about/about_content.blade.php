<!-- Content About-->
<section class="info_content">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Titles -->
        <h1 class="titles">
            <span>Our Company</span>
        </h1>
        <!-- End Titles -->

        <!-- Row fuid-->
        @forelse($abouts as $about)
            <div class="row center-responsive">
                <div class="col-md-4">
                    <img src="{{ asset('mhost/img/locations/'.$about->img) }}" alt="" class="img-responsive">
                </div>

                <div class="col-md-8">
                    <h3>{{ $about->title }}</h3>
                    <p>{!! $about->description !!}</p>
                </div>
            </div>
            @if( ($loop->count>1) && (!$loop->last))
                <div class="divider"></div>
            @endif
        @empty
            <div class="row center-responsive">
                <h3>Нет данных для отображения...</h3>
            </div>
        @endforelse
        <!-- End Row-->

        <div class="divider"></div>

        <!-- Row About (accordion & video)-->
        <div class="row">
            <div class="col-md-7">
                @forelse($accordions as $accordion)
                    <div class="accordion-trigger">{{ $accordion->name }}</div>
                    <div class="accordion-container">
                        {{--<h4>{{ $accordion->title }}</h4>--}}
                        @if($loop->index)
                            <h4>{{ $accordion->title }}</h4>
                        @endif
                        <p>{!! $accordion->text !!}</p>
                    </div>
                @if(!$loop->index)
                    <div class="clearfix"></div>
                @endif
                @empty
                    <div>
                        <p>No data for display</p>
                    </div>
                @endforelse
                {{--<div class="accordion-trigger">Honesty</div>
                <div class="accordion-container">
                    <h4>Honesty</h4>
                    <p>Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci.</p>
                </div>--}}

                {{--<div class="accordion-trigger">Responsibility</div>
                <div class="accordion-container">
                    <h4>Responsability</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    <ul class="check">
                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                        <li>Aliquam tincidunt mauris eu risus.</li>
                        <li>Vestibulum auctor dapibus neque.</li>
                    </ul>
                </div>--}}

            </div>

            <div class="col-md-5">
                <div class="video">
                    <iframe src="http://player.vimeo.com/video/7449107"></iframe>
                </div>
            </div>
        </div>
        <!-- End Row About-->

    </div>
    <!-- End Container-->
</section>
<!-- Content About-->