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
    // 定义各种币
    protected $api_market_name = ['btc'=>'比特币','ltc'=>'莱特币','xem'=>'新经币','xrp'=>'瑞波币','xlm'=>'恒星币','bts'=>'比特股'];

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
      $params = [
      'c'=>$this->api_market_all[0],
      'mk_type'=>self::MK_TYPE.$this->mk_type[0],
      ];

      $contents = $this->sendByCurl(self::BTC_LINK,'',$params);
      $contents =  json_decode($contents);
      return view('coinmarket.index', compact('contents'));

    }

    // coinmarketcap

    public function coinmarketcap()
    {

      $params = [
      'c'=>$this->cap_mk_type[0],
      'mk_type'=>self::CAP_TICKET.$this->cap_mk_type[0],
      'limit'=>self::CAP_LIMIT,
      ];

      $contents = $this->sendByCurl(self::CAP_LINK,'',$params);
      // return $contents;exit;
      $contents =  json_decode($contents);
      // var_dump($contents);exit;

      return view('coinmarket.market', compact('contents'));

    }

    /*
     * CURL请求数据
     * @param sting $url 请求的url地址
     * @param string $mode get|post 请求
     * @param string $params 必须是字符串 json|xml|http_build_query过的
     * @param int $timeout 请求超时时间 默认10秒
    */

    private static function sendByCurl($url, $mode, $params = '', $timeout = 10){
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
