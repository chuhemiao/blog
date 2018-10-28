@extends('layouts.app')

@section('content')

    @component('particals.jumbotron')
        <h3>比特币小白25H快讯</h3>

        {{--<h6>{{ config('blog.article.description') }}</h6>--}}
    @endcomponent
    
    @include('widgets.iotm')

    {{ $articles->links('pagination.default') }}

@endsection