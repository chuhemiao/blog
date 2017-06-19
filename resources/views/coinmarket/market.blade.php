@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ lang('Market Money') }}</h3>
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
                                    <th>名次</th> 
                                    <th>币种</th> 
                                    <th>总市值</th> 
                                    <th>当前价格</th> 
                                    <th>Circulating  Supply</th> 
                                    <th>24H VOL</th>
                                    <th>24H涨幅</th>
                                </tr>
                            </thead> 
                            <tfoot>
                                <tr>
                                    <th></th> 
                                    <th></th> 
                                    <th></th> 
                                    <th colspan="2"></th>
                                </tr>
                            </tfoot> 
                            <tbody>
                                @forelse($contents as $content)
                                <tr>
                                    <td>{{   $content->rank }}</td> 
                                    <td>{{   $content->name }}</td> 
                                    <td>{{   $content->market_cap_usd }}</td> 
                                    <td>{{   $content->price_usd }}</td> 
                                    <td>{{   $content->total_supply }}</td> 
                                    <td>{{   $content->24h_volume_usd }}</td>
                                    <td>{{   $content->percent_change_24h }}%</td>
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
