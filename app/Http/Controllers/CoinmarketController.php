<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 使用Guzzle
use GuzzleHttp\Client;

class CoinmarketController extends Controller
{


    public function index()
    {
        return '11111';
    }

    
    //	btc38平台接口地址
  //   protected $api_market_all = ['0'=>'xem','1'=>'btc','2'=>'dog','4'=>'ltc'];
  //   protected $mk_type = ['0'=>'cny','1'=>'btc'];
  //   const BTC_LINK = 'http://api.btc38.com/v1/ticker.php';
  //   const MK_TYPE =  '&mk_type=';
  //   public function index()
  //   {
  //       return "sdsd";

  //   	$client = new Client([
		//     'base_uri' => self::BTC_LINK,
		//     'timeout'  => 2.0,
		// ]);

		// $response = $client->request('GET', '?c='.$this->api_market_all[0].self::MK_TYPE.$this->mk_type[0]);
		// return $response;
  //   }
}
