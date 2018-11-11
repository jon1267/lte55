<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    {{--<title>Mega Host - Retina, Responsive And Bootstrap 3 Hosting Template</title>--}}
    <title>@yield('title') - от компании MegaHost</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Mega Host - Retina, Responsive And Bootstrap 3 Hosting Template">
    <meta name="author" content="iwthemes.com">
    --}}
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Theme CSS - Skin Version -->
    <link href="{{ asset('mhost/css/style.css') }}" rel="stylesheet" media="screen" class="skin_version">
    <!-- Responsive CSS -->
    <link href="{{ asset('mhost/css/theme-responsive.css') }}" rel="stylesheet" media="screen">
    <!-- Skins Color Theme -->
    <link href="#" rel="stylesheet" media="screen" class="skin_color">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mhost/css/revslider/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('mhost/rs-plugin/css/settings.css') }}" media="screen" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('mhost/img/icons/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('mhost/img/icons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('mhost/img/icons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('mhost/img/icons/apple-touch-icon-114x114.png') }}">

    <!-- Head Libs -->
    <script src="{{ asset('mhost/js/modernizr.js') }}"></script>

    <!--[if IE]>
    <link rel="stylesheet" href="{{ asset('mhost/css/ie/ie.css') }}">
    <![endif]-->

    <!--[if lte IE 8]>
    <script src="{{ asset('mhost/js/responsive/html5shiv.js') }}"></script>
    <script src="{{ asset('mhost/js/responsive/respond.js') }}"></script>
    <![endif]-->

    <!-- Skins Changer-->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
</head>
<body>
<!-- Theme-options -->
{{--@yield('theme_options')--}}
<!-- End Theme-options -->

<!-- layout-->
<div id="layout">
    <!-- Login Client -->
    @yield('login_client')
    <!-- End Login Client -->

    <!-- Header -->
    <header>
        <!-- Info Head -->
        @yield('pre_navigation')
        <!-- Info Head -->

        <!-- Nav -->
        @yield('navigation')
        <!-- End Nav -->

        <!-- Slide -->
        @yield('slider_breadcrumbs')
        <!-- End Slide -->

        <!-- Search Domain -->
        @yield('search_domain')
        <!-- End Search Domain -->
    </header>
    <!-- Header -->

    <!-- Content Features-->
    {{--@yield('content_features')--}}
    <!-- Content Features-->

    <!-- Content Pricing Tables-->
    {{--@yield('pricing_table')--}}
    <!-- Content Pricing Tables-->

    <!-- Content Varius-->
    @yield('content_varius')
    <!-- Content Varius-->



    <!-- Content Parters-->
    <!-- Content Parters-->

    <!-- Footer top-->
    <!-- End Footer top-->

    <!-- Footer Down-->
    <!-- End Footer Down-->
    @yield('footer')
</div>
<!-- End layout-->

<!-- ======================= JQuery libs =========================== -->
<!-- jQuery local-->
<script src="{{ asset('mhost/js/jquery.js') }}"></script>
<!--Nav-->
<script type="text/javascript" src="{{ asset('mhost/js/nav/tinynav.js') }}"></script>
<script type="text/javascript" src="{{ asset('mhost/js/nav/hoverIntent.js') }}"></script>
<script type="text/javascript" src="{{ asset('mhost/js/nav/superfish.js') }}"></script>
<script type="text/javascript" src="{{ asset('mhost/js/nav/jquery.sticky.js') }}"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset('mhost/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('mhost/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<!--Ligbox-->
<script type="text/javascript" src="{{ asset('mhost/js/fancybox/jquery.fancybox.js') }}"></script>
<!-- carousel.js-->
<script type="text/javascript" src="{{ asset('mhost/js/carousel/owl.carousel.js') }}"></script>
<!--Totop-->
<script type="text/javascript" src="{{ asset('mhost/js/totop/jquery.ui.totop.js') }}" ></script>
<!-- Filter -->
<script type="text/javascript" src="{{ asset('mhost/js/filters/jquery.isotope.js') }}" ></script>

<!--Theme Options  ??? !!! ломается верстка(пофиксено-пути к css theme-options.js) -->
<script type="text/javascript" src="{{ asset('mhost/js/theme-options/theme-options.js') }}"></script>

<script type="text/javascript" src="{{ asset('mhost/js/theme-options/jquery.cookies.js') }}"></script>
<!-- Bootstrap.js-->
<script type="text/javascript" src="{{ asset('mhost/js/bootstrap/bootstrap.js') }}"></script>
<!--MAIN FUNCTIONS-->
<script type="text/javascript" src="{{ asset('mhost/js/main.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.tp-banner').revolution(
            {
                delay:9000,
                startwidth:1170,
                startheight:500,
                hideThumbs:10
            });
    });
</script>

<!-- ======================= End JQuery libs =========================== -->

</body>
</html>