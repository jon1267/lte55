<!-- Content Features-->
<section class="info_content">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Row-->
        <div class="row">

            <!-- Item Location-->
            @forelse($contacts as $contact)
            <div class="col-sm-6 col-md-4">
                <div class="item_location">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('mhost/img/locations/'.$contact->img) }}" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $contact->title }}</h4>
                            <ul>
                                <li>{{ $contact->p1 }}</li>
                                <li>{{ $contact->p2 }}</li>
                                <li><a href="#">{{ $contact->p3 }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <p>{{ $contact->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div>
                    <p>Нет данных...</p>
                </div>
            @endforelse
            <!-- End Item Location-->

        </div>
        <!-- End Row-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Features-->


{{--
На Facebook зарегить приложение...
тут (https://developers.facebook.com/docs/plugins/comments)
где "Генератор кода плагина комментариев" заполнить форму
и нажать кнопу получить код. Появится код см ниже
недостаток комментят токо зарегистрир. на фб польз...

<!-- Это ставим в место для комментов-->
<div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>

<!-- Это код сгенериров Facebook comments plugin -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12&appId=1487476164696862&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
--}}
