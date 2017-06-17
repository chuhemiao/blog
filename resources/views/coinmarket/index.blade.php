@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ lang('Quotes') }}</h3>
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    <li class="list-group-item">ss</li>
                    <li class="list-group-item">xx</li>
                    <li class="list-group-item">xxx</li>
                    <li class="list-group-item">
                    @forelse($contents as $content)
                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="width-5-percent text-center">{{ lang('Coinmarkets') }}</th>
                            <th class="text-center">{{ lang('Now Price') }}</th>
                            <th >{{ lang('High Price') }}</th>
                            <th >{{ lang('Low Price') }}</th>
                            <th >{{ lang('Buys') }}</th>
                            <th >{{ lang('Sells') }}</th>
                            <th>{{ lang('Vols') }}</th>
                        </tr>
                        <tr>
                            <td class="text-center">{{   lang('Btc38')  }}</td>
                            <td class="text-center">{{   $content->last }}</td>
                            <td class="text-center">{{   $content->high  }}</td>
                            <td class="text-center">{{   $content->low  }}</td>
                            <td class="text-center">{{   $content->buy  }}</td>
                            <td class="text-center">{{   $content->sell  }}</td>
                            <td class="text-center">{{   $content->vol  }}</td>
                        </tr>
                    </table>
                    @empty
                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                    @endforelse
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
