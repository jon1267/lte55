<!-- Content Pricing Tables-->
<section class="info_content gray shadows borders">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Titles -->
        <h1 class="titles">
            <span>Our Plans</span>
        </h1>
        <!-- End Titles -->

        <!-- Row fuid-->
        <div class="row">

            <!-- Item table -->
            @forelse($prices as $price)
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="item_table">
                    <div class="head_table">
                        <h1>{{ $price->title }}</h1>
                        <h2>$ {{ $price->price }}  <span>{{ $price->mo }}</span></h2>
                        <h5>{{ $price->yearly }}</h5>
                    </div>
                    <ul>
                        <li class="color">{{ $price->hdd }}</li>
                        <li>{{ $price->bandwidth }}</li>
                        <li class="color">{{ $price->ram }}</li>
                        <li>{{ $price->ip }}</li>
                        <li class="color">{{ $price->cpanel }}</li>
                        <li>{{ $price->os }}</li>
                    </ul>
                    <a href="#" class="button">Order Now</a>
                </div>
            </div>
            @empty
                <div>
                    <h3>Нет данных...</h3>
                </div>
            @endforelse
            <!-- End Item table -->

        </div>
        <!-- End Row fuid-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Pricing Tables-->