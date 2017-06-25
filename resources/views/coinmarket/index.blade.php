@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ lang('Quotes') }}</h3>
    @endcomponent
<section class="app-main">
    <div class="container is-fluid is-marginless app-content">
        <div class="animated">
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <div class="table-responsive">
                        <table class="table is-bordered is-striped is-narrow">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ lang('Coinmarkets') }}</th>
                                    <th class="text-center">{{ lang('Coins K') }}</th>
                                    <th class="text-center">{{ lang('Now Price') }}</th>
                                    <th class="text-center">{{ lang('High Price') }}</th>
                                    <th class="text-center">{{ lang('Low Price') }}</th>
                                    <th class="text-center">{{ lang('Buys') }}</th>
                                    <th class="text-center">{{ lang('Sells') }}</th>
                                    <th class="text-center">{{ lang('Vols') }}</th>
                                </tr>
                            </thead> 
                            <tfoot>
                                <tr>
                                    <th></th> 
                                    <th></th> 
                                    <th></th> 
                                    <th></th> 
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>{{ lang('Waring Notices') }}</th>
                                </tr>
                            </tfoot> 
                            <tbody>
                                @forelse($cont_arr as $cont_arr)
                                <tr>
                                    <td class="text-center"><a href="{{   $cont_arr->ticker->market_url }}" target="_blank">{{   $cont_arr->ticker->market }}</a></td>
                                    <td class="text-center"><a href="{{   $cont_arr->ticker->url }}" target="_blank">{{   $cont_arr->ticker->symbol }}</a></td>
                                    <td class="text-center">{{   $cont_arr->ticker->last }}</td>
                                    <td class="text-center">{{   $cont_arr->ticker->high  }}</td>
                                    <td class="text-center">{{   $cont_arr->ticker->low  }}</td>
                                    <td class="text-center">{{   $cont_arr->ticker->buy  }}</td>
                                    <td class="text-center">{{   $cont_arr->ticker->sell  }}</td>
                                    <td class="text-center">{{   $cont_arr->ticker->vol  }}</td>
                                </tr> 
                                @empty
                                    <li class="list-group-item">{{ lang('Nothing') }}</li>
                                @endforelse
                            </tbody>
                        </table>
                </div>
                </article>
            </div>
        </div>
        </div>
    </div>
    </section>
@endsection
