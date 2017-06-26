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
                              <li><a href="#tab6default" data-toggle="tab">新经币</a></li>
                              <li><a href="#tab7default" data-toggle="tab">狗狗币</a></li>
                              <li><a href="#tab8default" data-toggle="tab">黑币</a></li>
                              <li><a href="#tab9default" data-toggle="tab">瑞波币</a></li>
                              <li><a href="#tab10default" data-toggle="tab">达世币</a></li>
                              <li><a href="#tab11default" data-toggle="tab">招财币</a></li>
                              <li><a href="#tab12default" data-toggle="tab">零币</a></li>
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
                          <div class="tab-pane fade" id="tab6default">
                            @include('particals.market')
                              @forelse($xem_data as $xem_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $xem_data->xem->ticker->market_url }}" target="_blank">{{   $xem_data->xem->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $xem_data->xem->ticker->url }}" target="_blank">{{   $xem_data->xem->ticker->k }}</a></td>
                                        <td class="text-center">{{   $xem_data->xem->ticker->last }}</td>
                                        <td class="text-center">{{   $xem_data->xem->ticker->high  }}</td>
                                        <td class="text-center">{{   $xem_data->xem->ticker->low  }}</td>
                                        <td class="text-center">{{   $xem_data->xem->ticker->buy  }}</td>
                                        <td class="text-center">{{   $xem_data->xem->ticker->sell  }}</td>
                                        <td class="text-center">{{   $xem_data->xem->ticker->vol  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab7default">
                            @include('particals.market')
                              @forelse($dog_data as $dog_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $dog_data->dog->ticker->market_url }}" target="_blank">{{   $dog_data->dog->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $dog_data->dog->ticker->url }}" target="_blank">{{   $dog_data->dog->ticker->k }}</a></td>
                                        <td class="text-center">{{   $dog_data->dog->ticker->last }}</td>
                                        <td class="text-center">{{   $dog_data->dog->ticker->high  }}</td>
                                        <td class="text-center">{{   $dog_data->dog->ticker->low  }}</td>
                                        <td class="text-center">{{   $dog_data->dog->ticker->buy  }}</td>
                                        <td class="text-center">{{   $dog_data->dog->ticker->sell  }}</td>
                                        <td class="text-center">{{   $dog_data->dog->ticker->vol  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab8default">
                            @include('particals.market')
                              @forelse($blk_data as $blk_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $blk_data->blk->ticker->market_url }}" target="_blank">{{   $blk_data->blk->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $blk_data->blk->ticker->url }}" target="_blank">{{   $blk_data->blk->ticker->k }}</a></td>
                                        <td class="text-center">{{   $blk_data->blk->ticker->last }}</td>
                                        <td class="text-center">{{   $blk_data->blk->ticker->high  }}</td>
                                        <td class="text-center">{{   $blk_data->blk->ticker->low  }}</td>
                                        <td class="text-center">{{   $blk_data->blk->ticker->buy  }}</td>
                                        <td class="text-center">{{   $blk_data->blk->ticker->sell  }}</td>
                                        <td class="text-center">{{   $blk_data->blk->ticker->vol  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab9default">
                            @include('particals.market')
                              @forelse($xrp_data as $xrp_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $xrp_data->xrp->ticker->market_url }}" target="_blank">{{   $xrp_data->xrp->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $xrp_data->xrp->ticker->url }}" target="_blank">{{   $xrp_data->xrp->ticker->k }}</a></td>
                                        <td class="text-center">{{   $xrp_data->xrp->ticker->last }}</td>
                                        <td class="text-center">{{   $xrp_data->xrp->ticker->high  }}</td>
                                        <td class="text-center">{{   $xrp_data->xrp->ticker->low  }}</td>
                                        <td class="text-center">{{   $xrp_data->xrp->ticker->buy  }}</td>
                                        <td class="text-center">{{   $xrp_data->xrp->ticker->sell  }}</td>
                                        <td class="text-center">{{   $xrp_data->xrp->ticker->vol  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab10default">
                            @include('particals.market')
                              @forelse($dash_data as $dash_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $dash_data->dash->ticker->market_url }}" target="_blank">{{   $dash_data->dash->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $dash_data->dash->ticker->url }}" target="_blank">{{   $dash_data->dash->ticker->k }}</a></td>
                                        <td class="text-center">{{   $dash_data->dash->ticker->last }}</td>
                                        <td class="text-center">{{   $dash_data->dash->ticker->high  }}</td>
                                        <td class="text-center">{{   $dash_data->dash->ticker->low  }}</td>
                                        <td class="text-center">{{   $dash_data->dash->ticker->buy  }}</td>
                                        <td class="text-center">{{   $dash_data->dash->ticker->sell  }}</td>
                                        <td class="text-center">{{   $dash_data->dash->ticker->vol  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab11default">
                            @include('particals.market')
                              @forelse($zcc_data as $zcc_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $zcc_data->zcc->ticker->market_url }}" target="_blank">{{   $zcc_data->zcc->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $zcc_data->zcc->ticker->url }}" target="_blank">{{   $zcc_data->zcc->ticker->k }}</a></td>
                                        <td class="text-center">{{   $zcc_data->zcc->ticker->last }}</td>
                                        <td class="text-center">{{   $zcc_data->zcc->ticker->high  }}</td>
                                        <td class="text-center">{{   $zcc_data->zcc->ticker->low  }}</td>
                                        <td class="text-center">{{   $zcc_data->zcc->ticker->buy  }}</td>
                                        <td class="text-center">{{   $zcc_data->zcc->ticker->sell  }}</td>
                                        <td class="text-center">{{   $zcc_data->zcc->ticker->vol  }}</td>
                                    </tr>
                                    @empty
                                        <li class="list-group-item">{{ lang('Nothing') }}</li>
                              @endforelse
                                  </tbody>
                              </table>
                          </div>
                          <div class="tab-pane fade" id="tab12default">
                            @include('particals.market')
                              @forelse($xzc_data as $xzc_data)
                                    <tr>
                                        <td class="text-center"><a href="{{   $xzc_data->xzc->ticker->market_url }}" target="_blank">{{   $xzc_data->xzc->ticker->market }}</a></td>
                                        <td class="text-center"><a href="{{   $xzc_data->xzc->ticker->url }}" target="_blank">{{   $xzc_data->xzc->ticker->k }}</a></td>
                                        <td class="text-center">{{   $xzc_data->xzc->ticker->last }}</td>
                                        <td class="text-center">{{   $xzc_data->xzc->ticker->high  }}</td>
                                        <td class="text-center">{{   $xzc_data->xzc->ticker->low  }}</td>
                                        <td class="text-center">{{   $xzc_data->xzc->ticker->buy  }}</td>
                                        <td class="text-center">{{   $xzc_data->xzc->ticker->sell  }}</td>
                                        <td class="text-center">{{   $xzc_data->xzc->ticker->vol  }}</td>
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