<!-- Content Our facilities -->
<section id="ourFacilities" class="info_content bg_parallax">
    <div class="opacy_bg paddings">
        <div class="container wow bounceInRight animated">
            <div class="row ourFacilities">
                <div class="col-md-12">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-7">
                        <h1>{{ $grays[0]['title'] }}</h1>
                        <p>
                            <span>
                              {{--{{ $grays[0]['text'] }}--}}
                              {!! $grays[0]['text'] !!}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content Our facilities -->

<section>
    <div class="skin_base paddings">
        <div class="container wow bounceIn animated">
            <div class="row">
                <div class="col-md-12">
                    {{--синяя полоса под серой с нач. текстом "Need Help? Call our..." можно
                    сделать текст. часть анологично см выше: <h1></h1><p><span></span></p>--}}
                    <h1 style="text-align: center;">
                        <span style="color: #ffffff;">{{ $grays[1]['title'] }} {{ $grays[1]['text'] }}</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>