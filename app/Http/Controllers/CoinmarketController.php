<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 使用Guzzle
use GuzzleHttp\Client;

class CoinmarketController extends Controller
{
    //	btc38平台接口地址
    protected $api_market_all = ['0'=>'xem','1'=>'btc','2'=>'dog','4'=>'ltc','5'=>'all'];
    protected $mk_type = ['0'=>'cny','1'=>'btc'];
    const BTC_LINK = 'http://api.btc38.com/v1/ticker.php';
    const MK_TYPE =  '&mk_type=';
    // coinmarketcap
    const CAP_LINK = 'https://api.coinmarketcap.com/v1/ticker/';
    protected $cap_mk_type =['0'=>'CNY','1'=>'EUR','1'=>'JPY'];

    const BTC_MARKET_LINK = 'https://www.btc123.com/market/btc38?symbol=btc38';

    public function index()
    {
        return view('coinmarket.index');
    }

    public function btc()
    {
      $params = [
      'c'=>$this->api_market_all[5],
      'mk_type'=>self::MK_TYPE.$this->mk_type[0],
      ];
      $coin_all = ['btc','xem','doge','ltc','bts','zcc','xrp','mec','dash','ppc'];

      $contents = $this->sendByCurl(self::BTC_LINK,'',$params);
      $cont_arr = json_decode($contents,true);
      foreach ($cont_arr as $key => $value) {
          if(in_array($key, $coin_all)){
              switch ($key) {
                case 'btc':
                  $cont_arr[$key]['ticker']['symbol'] = '比特币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38btccny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'xem':
                  $cont_arr[$key]['ticker']['symbol'] = '新经币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38xemcny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'doge':
                  $cont_arr[$key]['ticker']['symbol'] = '狗狗币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38dogecny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'ltc':
                  $cont_arr[$key]['ticker']['symbol'] = '莱特币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38ltccny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'bts':
                  $cont_arr[$key]['ticker']['symbol'] = '比特股';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38btscny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'zcc':
                  $cont_arr[$key]['ticker']['symbol'] = '招财币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38zcccny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'xrp':
                  $cont_arr[$key]['ticker']['symbol'] = '瑞波币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38xrpcny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'mec':
                  $cont_arr[$key]['ticker']['symbol'] = '美卡币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38meccny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'dash':
                  $cont_arr[$key]['ticker']['symbol'] = '达世币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38dashcny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                case 'ppc':
                  $cont_arr[$key]['ticker']['symbol'] = '点点币';
                  $cont_arr[$key]['ticker']['market'] = '比特时代';
                  $cont_arr[$key]['ticker']['url'] = 'https://www.btc123.com/market/btc38?symbol=btc38ppccny';
                  $cont_arr[$key]['ticker']['market_url'] = 'http://www.btc38.com';
                  break;
                default:
                  break;
              }
          }else{
            unset($cont_arr[$key]);
          }
          
      }
      $cont_arr =  json_decode(json_encode($cont_arr))  ;
      
      // var_dump($cont_arr);exit;

      return view('coinmarket.index', compact('cont_arr'));

    }

    // coinmarketcap

    public function coinmarketcap()
    {

      $params = [
        'convert'=>$this->cap_mk_type[0],
        'limit'=>88,
      ];

      $contents = $this->sendByCurl(self::CAP_LINK,'',$params);
      $contents =  json_decode($contents,true);
      foreach ($contents as $key => $value) {
        $contents[$key]['vol_usd'] = $value['24h_volume_usd'];
        $contents[$key]['percent_change'] = $value['percent_change_24h'];
        unset($value['24h_volume_usd']);
        unset($value['percent_change_24h']);
      }
      $contents =  json_decode(json_encode($contents)) ;

      return view('coinmarket.market', compact('contents'));

    }

    /*
     * CURL请求数据
     * @param sting $url 请求的url地址
     * @param string $mode get|post 请求
     * @param string $params 必须是字符串 json|xml|http_build_query过的
     * @param int $timeout 请求超时时间 默认10秒
    */

    private static function sendByCurl($url, $mode, $params = '', $timeout = 100){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); //设置超时时间
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回原生输出

        if ($mode == 'post') {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
            curl_setopt($ch, CURLOPT_POST, true); //发送一个常规的POST请求
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //全部数据使用HTTP协议中的"POST"操作来发送
        }else{
            $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($params); //如果是get,则会对url进行添加param参数
        }
        curl_setopt($ch, CURLOPT_URL, $url); // 需要获取的URL地址
        $result = curl_exec($ch);

        $errno = curl_errno($ch);
        if ($errno) {
            return array(
                'errno' => $errno,
                'error' => curl_error($ch),
            );
        }
        curl_close($ch);
        return $result;
    }

}
