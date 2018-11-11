@extends('layouts.master')

@section('title')
 {{$seoData['title']}}
@endsection
@section('meta-description')
    {{$seoData['meta_description']}}
@endsection
@section('meta-keywords')
    {{--{{ $seoData['meta_keywords'] }} 300 символов ... --}}
    {{str_limit($seoData['meta_keywords'], 300)}}
@endsection

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
    @include($slider)
@endsection
@section('search_domain')
    @include('site.search_domain')
@endsection


@section('content_varius')
    @for($i=0; $i<count($templates); $i++)
        @include($templates[$i])
    @endfor
@endsection


@section('footer')
    @include('site.footer.sponsors')
    @include('site.footer.footer_top')
    @include('site.footer.footer_down') {{-- !! $footer !! --}}
@endsection