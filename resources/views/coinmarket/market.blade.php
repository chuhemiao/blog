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
                                    <th>发行量</th> 
                                    <th>24H成交量</th>
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
                                    <td>{{   $content->symbol }}</td> 
                                    <td>{{   $content->market_cap_usd }}</td> 
                                    <td>{{   $content->price_usd }}</td> 
                                    <td>{{   $content->total_supply }}</td> 
                                    <td>{{   $content->vol_usd }}</td>
                                    <td>{{   $content->percent_change }}%</td>
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
