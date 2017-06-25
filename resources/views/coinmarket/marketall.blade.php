@extends('layouts.app')


@section('content')
    @component('particals.jumbotron')
        <h4>TokenMarket</h4>

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
                              <li><a href="#tab6default" data-toggle="tab">比特时代</a></li>
                              <li><a href="#tab7default" data-toggle="tab">云币网</a></li>
                              <li><a href="#tab8default" data-toggle="tab">聚币网</a></li>
                              <li><a href="#tab9default" data-toggle="tab">海枫藤</a></li>
                              <li><a href="#tab10default" data-toggle="tab">币盈网</a></li>
                              <li><a href="#tab11default" data-toggle="tab">P网</a></li>
                              <li><a href="#tab12default" data-toggle="tab">B网</a></li>
                          </ul>
                  </div>
                  <div class="panel-body">
                      <div class="tab-content">
                          <div class="tab-pane fade in active" id="tab1default">
                              @include('particals.market')
                              @forelse($data_btc as $data_btc)
                                      <tr>
                                          <td class="text-center"><a href="{{    $data_btc->btc->ticker->market_url }}" target="_blank">{{   $data_btc->btc->ticker->market }}</a></td>
                                          <td class="text-center"><a href="{{    $data_btc->btc->ticker->url }}" target="_blank">{{   $data_btc->btc->ticker->k }}</a></td>
                                          <td class="text-center">{{   $data_btc->btc->ticker->last }}</td>
                                          <td class="text-center">{{   $data_btc->btc->ticker->high  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->ticker->low  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->ticker->buy  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->ticker->sell  }}</td>
                                          <td class="text-center">{{   $data_btc->btc->ticker->vol  }}</td>
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
                                          <td class="text-center"><a href="{{   $ltc_data->ltc->ticker->market_url }}" target="_blank">{{   $ltc_data->ltc->ticker->market }}</a></td>
                                          <td class="text-center"><a href="{{   $ltc_data->ltc->ticker->url }}" target="_blank">{{   $ltc_data->ltc->ticker->k }}</a></td>
                                          <td class="text-center">{{   $ltc_data->ltc->ticker->last }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->ticker->high  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->ticker->low  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->ticker->buy  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->ticker->sell  }}</td>
                                          <td class="text-center">{{   $ltc_data->ltc->ticker->vol  }}</td>
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
                                          <td class="text-center"><a href="{{   $eth_data->eth->ticker->market_url }}" target="_blank">{{   $eth_data->eth->ticker->market }}</a></td>
                                          <td class="text-center"><a href="{{   $eth_data->eth->ticker->url }}" target="_blank">{{   $eth_data->eth->ticker->k }}</a></td>
                                          <td class="text-center">{{   $eth_data->eth->ticker->last }}</td>
                                          <td class="text-center">{{   $eth_data->eth->ticker->high  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->ticker->low  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->ticker->buy  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->ticker->sell  }}</td>
                                          <td class="text-center">{{   $eth_data->eth->ticker->vol  }}</td>
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
                                          <td class="text-center"><a href="{{   $etc_data->etc->ticker->market_url }}" target="_blank">{{   $etc_data->etc->ticker->market }}</a></td>
                                          <td class="text-center"><a href="{{   $etc_data->etc->ticker->url }}" target="_blank">{{   $etc_data->etc->ticker->k }}</a></td>
                                          <td class="text-center">{{   $etc_data->etc->ticker->last }}</td>
                                          <td class="text-center">{{   $etc_data->etc->ticker->high  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->ticker->low  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->ticker->buy  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->ticker->sell  }}</td>
                                          <td class="text-center">{{   $etc_data->etc->ticker->vol  }}</td>
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
                                          <td class="text-center">{{   $iota_data->iot->mid  }}</td>
                                          <td class="text-center">{{   $iota_data->iot->volume  }}</td>
                                      </tr>
                                      @empty
                                          <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab6default">程序员正在努力开发中</div>
                          <div class="tab-pane fade" id="tab7default">程序员正在努力开发中</div>
                          <div class="tab-pane fade" id="tab8default">程序员正在努力开发中</div>
                          <div class="tab-pane fade" id="tab9default">程序员正在努力开发中</div>
                          <div class="tab-pane fade" id="tab10default">程序员正在努力开发中</div>
                          <div class="tab-pane fade" id="tab11default">程序员正在努力开发中</div>
                          <div class="tab-pane fade" id="tab12default">程序员正在努力开发中</div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>

</section>
@endsection