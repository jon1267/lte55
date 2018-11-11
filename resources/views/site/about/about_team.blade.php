<!-- Content Team Members-->
<section class="info_content gray shadows borders">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Titles -->
        <h1 class="titles">
            <span>Our Team</span>
        </h1>
        <!-- End Titles -->

        <!-- Row Team Members-->
        <div class="row">

            <!-- Item Team-->
            @forelse($teams as $team)
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="item_team">
                    <div class="img_team">
                        <img src="{{ asset('mhost/img/team/'.$team->img) }}" alt="Image">
                        <div class="name_team">
                            <h5>{{ $team->name }}</h5>
                            <span>{{ $team->position }}</span>
                        </div>
                    </div>
                    <div class="info_team">
                        <p>{{ $team->text }}</p>
                        <ul class="social_team">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <p>Нет данных</p>
                </div>
            @endforelse
            <!-- End Item Team-->

        </div>
        <!-- End Row Team Members-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Team Members-->