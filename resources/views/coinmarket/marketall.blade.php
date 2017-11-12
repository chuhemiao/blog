@extends('layouts.app')


@section('content')
    @component('particals.jumbotron')
        <h4>TokenMarket 美元</h4>

        <div class="header">
            
        </div>
    @endcomponent
<section class="app-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              <div class="panel with-nav-tabs panel-default">
                  <div class="panel-heading">
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab1default" data-toggle="tab">比特币</a></li>
                              <li><a href="#tab2default" data-toggle="tab">莱特币</a></li>
                              <li><a href="#tab3default" data-toggle="tab">ETH</a></li>
                              <li><a href="#tab4default" data-toggle="tab">ETC</a></li>
                              <li><a href="#tab5default" data-toggle="tab">IOTA</a></li>
                              <li><a href="#tab6default" data-toggle="tab">BCH</a></li>
                          </ul>
                  </div>
                  <div class="panel-body">
                      <div class="tab-content">
                          <div class="tab-pane fade in active" id="tab1default">
                              @include('particals.market')
                              @forelse($data_btc as $data_btc)
                                      <tr>
                                          <td class="text-center"><a href="{{    $data_btc->btc->market_url }}" target="_blank">{{   $data_btc->btc->market }}</a></td>
                                          <td class="text-center"><a href="{{    $data_btc->btc->url }}" target="_blank">{{   $data_btc->btc->k }}</a></td>
                                          <td class="text-center">{{   $data_btc->btc->last_price }}</td>
                                          <td class="text-center">{{   $data_btc->btc->high  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->low  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->bid  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->ask  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->volume  }}</td>
                                      </tr>
                                      @empty
                                          <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>

                          <div class="tab-pane fade" id="tab2default">
                              @include('particals.market')
                              @forelse($ltc_data as $ltc_data)
                                      <tr>
                                          <td class="text-center"><a href="{{   $ltc_data->ltc->market_url }}" target="_blank">{{   $ltc_data->ltc->market }}</a></td>
                                          <td class="text-center"><a href="{{   $ltc_data->ltc->url }}" target="_blank">{{   $ltc_data->ltc->k }}</a></td>
                                          <td class="text-center">{{   $ltc_data->ltc->last_price }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->high  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->low  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->bid  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->ask  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->volume  }}</td>
                                      </tr>
                                      @empty
                                          <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                           <div class="tab-pane fade" id="tab3default">
                            @include('particals.market')
                              @forelse($eth_data as $eth_data)
                                      <tr>
                                          <td class="text-center"><a href="{{   $eth_data->eth->market_url }}" target="_blank">{{   $eth_data->eth->market }}</a></td>
                                          <td class="text-center"><a href="{{   $eth_data->eth->url }}" target="_blank">{{   $eth_data->eth->k }}</a></td>
                                          <td class="text-center">{{   $eth_data->eth->last_price }}</td>
                                          <td class="text-center">{{   $eth_data->eth->high  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->low  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->bid  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->ask  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->volume  }}</td>
                                      </tr>
                                      @empty
                                          <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>

                          <div class="tab-pane fade" id="tab4default">
                            @include('particals.market')
                              @forelse($etc_data as $etc_data)
                                      <tr>
                                          <td class="text-center"><a href="{{   $etc_data->etc->market_url }}" target="_blank">{{   $etc_data->etc->market }}</a></td>
                                          <td class="text-center"><a href="{{   $etc_data->etc->url }}" target="_blank">{{   $etc_data->etc->k }}</a></td>
                                          <td class="text-center">{{   $etc_data->etc->last_price }}</td>
                                          <td class="text-center">{{   $etc_data->etc->high  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->low  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->bid  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->ask  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->volume  }}</td>
                                      </tr>
                                      @empty
                                          <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>

                          <div class="tab-pane fade" id="tab5default">
                            @include('particals.market')
                              @forelse($iota_data as $iota_data)
                                      <tr>
                                          <td class="text-center"><a href="{{   $iota_data->iot->market_url }}" target="_blank">{{   $iota_data->iot->market }}</a></td>
                                          <td class="text-center"><a href="{{   $iota_data->iot->url }}" target="_blank">{{   $iota_data->iot->k }}</a></td>
                                          <td class="text-center">{{   $iota_data->iot->last_price }}</td>
                                          <td class="text-center">{{   $iota_data->iot->high  }}</td>
                                          <td class="text-center">{{   $iota_data->iot->low  }}</td>
                                          <td class="text-center">{{   $iota_data->iot->bid  }}</td>
                                          <td class="text-center">{{   $iota_data->iot->ask  }}</td>
                                          <td class="text-center">{{   $iota_data->iot->volume  }}</td>
                                      </tr>
                                      @empty
                                          <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>

                          <div class="tab-pane fade" id="tab6default">
                            @include('particals.market')
                              @forelse($bch_data as $bch_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $bch_data->bch->market_url }}" target="_blank">{{   $bch_data->bch->market }}</a></td>
                                        <td class="text-center"><a href="{{   $bch_data->bch->url }}" target="_blank">{{   $bch_data->bch->k }}</a></td>
                                        <td class="text-center">{{   $bch_data->bch->last_price }}</td>
                                        <td class="text-center">{{   $bch_data->bch->high  }}</td>
                                        <td class="text-center">{{   $bch_data->bch->low  }}</td>
                                        <td class="text-center">{{   $bch_data->bch->bid  }}</td>
                                        <td class="text-center">{{   $bch_data->bch->ask  }}</td>
                                        <td class="text-center">{{   $bch_data->bch->volume  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>

</section>
@endsection