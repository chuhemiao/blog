@extends('layouts.app')

@section('content')
    
    @include('particals.swiper')

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection