<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 使用Guzzle
use GuzzleHttp\Client;

class CoinmarketController extends Controller
{
    //	btc38平台接口地址
    protected $api_market_all = ['0'=>'xem','1'=>'btc','2'=>'dog','4'=>'ltc'];
    protected $mk_type = ['0'=>'cny','1'=>'btc'];
    const BTC_LINK = 'http://api.btc38.com/v1/ticker.php';
    const MK_TYPE =  '&mk_type=';
    // coinmarketcap

    const CAP_LINK = 'https://api.coinmarketcap.com/v1/ticker/';
    protected $cap_mk_type =['0'=>'CNY','1'=>'EUR','1'=>'JPY'];
    const CAP_TICKET = '?convert=';
    const CAP_LIMIT  =  '&limit=10';



    public function index()
    {
        return view('coinmarket.index');
    }

    public function btc()
    {
      // header('Access-Control-Allow-Origin: *');
    	$client = new Client([
		    'base_uri' => self::BTC_LINK,
		    'timeout'  => 2.0,
  		]);

  		$response = $client->request('GET', '?c='.$this->api_market_all[0].self::MK_TYPE.$this->mk_type[0]);
      return $response;
    }

    // coinmarketcap

    public function coinmarketcap()
    {

      $client = new Client([
        'base_uri' => self::CAP_LINK,
        'timeout'  => 2.0,
      ]);

      $response = $client->request('GET', self::CAP_TICKET.$this->cap_mk_type[0].self::CAP_LIMIT);
      return $response;

    }
}
