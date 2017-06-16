@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ lang('Coinmarkets') }}</h3>
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="links text-center">
                    @forelse($links as $link)
                    <div class="media">
                        <a class="media-left" href="{{ $link->link }}">
                            <img alt="{{ $link->name }}" src="{{ $link->image }}" data-holder-rendered="true">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="{{ $link->link }}">{{ $link->name }}</a>
                            </h4>
                        </div>
                    </div>
                    @empty
                        <li><h3>{{ lang('Nothing') }}</h3></li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
