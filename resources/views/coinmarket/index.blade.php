@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ lang('Coinmarkets') }}</h3>
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="links text-center">
                    
                </ul>
            </div>
        </div>
    </div>
@endsection
