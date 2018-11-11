<!-- Content Features-->
<section class="info_content">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Titles -->
        <h1 class="titles">
            <span>Features</span>
        </h1>
        <!-- End Titles -->

        <!-- Row fuid-->
        <div class="row">

            <!-- Item feature-->
            @forelse($features as $feature)
            <div class="col-sm-6 col-md-4">
                <div class="item_feature border_right">
                    <div class="row head_feature">
                        <div class="col-md-2">
                            <img src="{{ asset('mhost/img/icons_features/'.$feature->img) }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h4>{{ $feature->title }}</h4>
                            <h6>{{ $feature->blue }}</h6>
                        </div>
                    </div>
                    <p>{{ $feature->text }}</p>
                </div>
            </div>
            @empty
                <h3>Нет данных...</h3>
            @endforelse
            <!-- End Item feature-->



        </div>
        <!-- End Row fuid-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Features-->