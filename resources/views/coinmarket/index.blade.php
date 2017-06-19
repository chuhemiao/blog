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
                                    <th class="text-center">{{ lang('Coins') }}</th>
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
                                    <th></th>
                                </tr>
                            </tfoot> 
                            <tbody>
                                @forelse($contents as $content)
                                <tr>
                                    <td class="text-center">{{   lang('Btc38') }}</td>
                                    <td class="text-center">{{   lang('Xems') }}</td>
                                    <td class="text-center">{{   $content->last }}</td>
                                    <td class="text-center">{{   $content->high  }}</td>
                                    <td class="text-center">{{   $content->low  }}</td>
                                    <td class="text-center">{{   $content->buy  }}</td>
                                    <td class="text-center">{{   $content->sell  }}</td>
                                    <td class="text-center">{{   $content->vol  }}</td>
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
