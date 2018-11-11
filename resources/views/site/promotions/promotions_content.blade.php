<!-- Content Info Content-->
<section class="info_content">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Row-->
        <div class="row">
            <!-- Left Content-->
            @forelse($promotions as $promotion)
                <div class="col-md-5 {{ ($loop->first) ? 'text_right' : '' }}">
                    <h1>{{ $promotion->title }}</h1>
                    <h4>{{ $promotion->p1 }}</h4>
                    <p>{{ $promotion->t1 }}</p>
                    <h4>{{ $promotion->p2 }}</h4>
                    <p>{{ $promotion->t2 }}</p>
                    <h4>{{ $promotion->p3 }}</h4>
                    <p>{{ $promotion->t3 }}</p>
                </div>
            <!-- End Left Content-->

            <!-- Divisor Line-->
                @if($loop->first)
                    <div class="col-md-2 more_vertical"></div>
                @endif
            <!-- End Divisor Line-->
            @empty
                <div>
                    <p>No data for display</p>
                </div>
            @endforelse

            <!-- Right Content-->
            {{--<div class="col-md-5">
                <h1>Unattainable Promotions %</h1>
                <h4>A fair prices</h4>
                <p>Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et.</p>
                <h4>Without paying more</h4>
                <p>Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et.</p>
                <h4>Do not think twice</h4>
                <p>Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et.</p>
            </div>--}}
            <!-- End Right Content-->

        </div>
        <!-- End Row-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Info Content-->