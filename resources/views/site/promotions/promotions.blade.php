@extends('layouts.master')

{{--@section('theme_options')--}}
    {{--@include('site.theme_options')--}}
{{--@endsection--}}
@section('login_client')
    @include('site.login_client')
@endsection
@section('pre_navigation')
    @include('site.info_head')
@endsection
@section('navigation')
    @include('site.navigation')  {{-- !! $navigation !! --}}
@endsection

@section('slider_breadcrumbs')
    @include('site.breadcrumb')
@endsection
@section('search_domain')
    @include('site.search_domain')
@endsection

@section('content_varius')
    @include($templates[0])
    @include($templates[1])
    @include($templates[2])
@endsection

@section('footer')
    @include('site.footer.sponsors')
    @include('site.footer.footer_top')
    @include('site.footer.footer_down') {{-- !! $footer !! --}}
@endsection