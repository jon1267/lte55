<!-- Content Works-->
<section class="info_content animation-elements">
    <!-- Container-->
    <div class="container">

        <!-- Nav Filters -->
        <div class="portfolioFilter">
            <a href="#" data-filter="*" class="current">Show All</a>
            <a href="#desing" data-filter=".desing">Desing</a>
            <a href="#development" data-filter=".development">Development</a>
            <a href="#mobile" data-filter=".mobile">Mobile</a>
            <a href="#retina" data-filter=".retina">Retina Desing</a>
        </div>
        <!-- End Nav Filters -->

        <!-- Items Works filters-->
        <div class="portfolioContainer tooltip-hover">

            <!-- Item Work-->
            @forelse($portfolios as $portfolio)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3  {{ $filters[$loop->index] or '*'}}">
                <div class="item-work">
                    <div class="hover">
                        <img src="{{ asset('mhost/img/works/'.$portfolio->img) }}" alt=""/>
                        <a href="{{ asset('mhost/img/works/'.$portfolio->img) }}" class="fancybox" title="Zoom Image"><div class="overlay"></div></a>
                    </div>
                    <div class="info-work">
                        <h4>{{ $portfolio->title }}e</h4>
                        <p>{{ $portfolio->description }}</p>
                        <div class="icons-work">
                            {{--<i class="fa fa-tablet" data-toggle="tooltip" title data-original-title="Responsive Desing"></i>
                            <i class="fa fa-desktop" data-toggle="tooltip" title data-original-title="Retina Display"></i>--}}
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div>
                    <p>No data for display</p>
                </div>
            @endforelse
            <!-- End Item Work-->


        </div>
        <!-- End Items Works filters-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Works-->