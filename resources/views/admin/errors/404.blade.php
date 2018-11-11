@extends('admin.errors.error')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include($template)
@endsection
