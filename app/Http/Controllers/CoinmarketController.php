<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 使用Guzzle
use GuzzleHttp\Client;

class CoinmarketController extends Controller
{
    //	btc38平台接口地址
    protected $api_market_all = ['0'=>'xem','1'=>'btc','2'=>'doge','4'=>'ltc','5'=>'blk','6'=>'eth','7'=>'etc','8'=>'iot','9'=>'xrp','10'=>'dash','11'=>'bch'];
    protected $mk_type = ['0'=>'cny','1'=>'btc','2'=>'usd'];
    const BTC_LINK = 'http://api.btc38.com/v1/ticker.php';
    const MK_TYPE =  '&mk_type=';
    protected $btcera_info = ['0'=>'比特时代','1'=>'https://www.btc123.com/market/btc38?symbol=btc38','2'=>'http://www.btc38.com'];//交易市场、k线、网站首页
    protected $btcera_market_diff = ['0'=>'btcera_btc','1'=>'btcera_ltc','2'=>'btcera_xem','3'=>'btcera_dog','4'=>'btcera_eth','5'=>'btcera_etc'];


    // coinmarketcap
    const CAP_LINK = 'https://api.coinmarketcap.com/v1/ticker/';
    protected $cap_mk_type =['0'=>'CNY','1'=>'EUR','1'=>'JPY'];

    // 火币网
    const HUO_BI_LINK = 'http://api.huobi.com/staticmarket/ticker_';
    protected $huobi_info = ['0'=>'火币网','1'=>'https://www.huobi.com/market/','2'=>'https://www.huobi.com'];//交易市场、k线、网站首页
    protected $huobi_market = ['0'=>'cny_btc','1'=>'cny_ltc','2'=>'cny_eth'];
    protected $huobi_market_diff = ['0'=>'huobi_btc','1'=>'huobi_ltc','2'=>'huobi_eth'];

    //okcoin
    const OKCOIN_LINK = 'https://www.okcoin.cn/api/v1/ticker.do';
    protected $okcoin_info = ['0'=>'oKCoin','1'=>'https://www.okcoin.com/market-','2'=>'https://www.okcoin.com'];//交易市场、k线、网站首页
    protected $okcoin_market = ['0'=>'btc_cny','1'=>'ltc_cny','2'=>'eth_cny'];
    protected $okcoin_market_diff = ['0'=>'okCoin_btc','1'=>'okCoin_ltc','2'=>'okCoin_eth'];

    // bitfinex 
    const BITFINEX_LINK = 'https://api.bitfinex.com/v1/pubticker/';
    protected $bitfinex_info = ['0'=>'B网','1'=>'https://bitfinex.com','2'=>'https://bitfinex.com'];//交易市场、k线、网站首页
    protected $bitfinex_market_diff = ['0'=>'bitfinex_btc','1'=>'bitfinex_ltc','2'=>'bitfinex_etc','3'=>'bitfinex_eth','4'=>'bitfinex_iota','5'=>'bitfinex_bch'];




    public function index()
    {
        return view('coinmarket.index');
    }

    // coinmarketcap

    public function coinmarketcap()
    {

      $params = [
        'convert'=>$this->cap_mk_type[0],
        'limit'=>88,
      ];

      $contents = $this->sendByCurl(self::CAP_LINK,'get',$params);
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

    // ico
    public function ico()
    {
        return view('coinmarket.ico');
    }

    // 所有交易分类
    public function marketall()
    {
      // 比特币交易价格
      $data_btc = [];
      // bitfinex
      $data_btc = $this->bitfinexAll($data_btc,$this->mk_type[2],$this->bitfinex_market_diff[0],$this->api_market_all[1]);

      $data_btc = json_decode(json_encode($data_btc));

      // 比特币交易价格  end


      // 莱特币交易价格
      $ltc_data = [];
      // bitfinex
      $ltc_data = $this->bitfinexAll($ltc_data,$this->mk_type[2],$this->bitfinex_market_diff[1],$this->api_market_all[4]);
      $ltc_data = json_decode(json_encode($ltc_data));
      // 莱特币交易价格 end

      // eth交易价格
      $eth_data = [];

      // bitfinex
      $eth_data = $this->bitfinexAll($eth_data,$this->mk_type[2],$this->bitfinex_market_diff[3],$this->api_market_all[6]);
      
      $eth_data = json_decode(json_encode($eth_data));

      
      // eth交易价格end

      // etc价格
      $etc_data = [];
      // bitfinex
      $etc_data = $this->bitfinexAll($etc_data,$this->mk_type[2],$this->bitfinex_market_diff[2],$this->api_market_all[7]);
      
      $etc_data = json_decode(json_encode($etc_data));
      // etc价格 end

      // bch
      $bch_data = [];
      $bch_data = $this->bitfinexAll($bch_data,$this->mk_type[2],$this->bitfinex_market_diff[5],$this->api_market_all[11]);

      //iota
      $iota_data = [];
      $iota_data = $this->bitfinexAll($iota_data,$this->mk_type[2],$this->bitfinex_market_diff[4],$this->api_market_all[8]);

      return view('coinmarket.marketall', compact('data_btc','ltc_data','eth_data','etc_data','bch_data','iota_data'));
    }

    /* 
    *bitfinex  所有币种价格
    *请求方式为/xxx/xxx
    *
    */
    public function bitfinexAll($bitfinex_data,$market,$chinabtc_market_diff,$api_market_all)
    {
      $bitfinex_params = [];
      $bitfinex_url = self::BITFINEX_LINK.$api_market_all.$market;
      $bitfinex = $this->bitfinex($bitfinex_url,$bitfinex_params,$this->bitfinex_info[0],$this->bitfinex_info[1],$this->bitfinex_info[2],$chinabtc_market_diff,$api_market_all);
      $bitfinex_data[$chinabtc_market_diff] = $bitfinex;
      return $bitfinex_data;
    }

    /*
    *火币网
    *请求方式/
    */
    public function huobiAll($huobi_data,$market,$huobi_market_diff,$api_market_all)
    {
      $huobi_params = [];
      $huobi_url = self::HUO_BI_LINK.$api_market_all.'_json.js';
      $huobi = $this->huobiGetAll($huobi_url,$huobi_params,$this->huobi_info[0],$this->huobi_info[1].$this->huobi_market[2],$this->huobi_info[2],$api_market_all);
      $huobi_data[$huobi_market_diff] = $huobi;

      return $huobi_data;
    }

    /*
    *中国比特币 所有币种价格
    *$btc_data   接受数据数组
    *$market   当前所取出的币种
    */
    public function chinabtcAll($chinabtc_data,$market,$chinabtc_market_diff,$api_market_all)
    {
      $chinabtc_params = ['currency'=>$market];
      $chinabtc_url = self::CHINABTC_LINK;
      $chinabtc = $this->okCoin($chinabtc_url,$chinabtc_params,$this->chinabtc_info[0],$this->chinabtc_info[1].$api_market_all,$this->chinabtc_info[2],$api_market_all);
      $chinabtc_data[$chinabtc_market_diff] = $chinabtc;
      return $chinabtc_data;
    }

    /*
    *比特中国 所有币种价格
    *$btc_data   接受数据数组
    *$market   当前所取出的币种
    */
    public function btchinaAll($btcchina_data,$market,$btcchina_market_diff,$api_market_all)
    {
      $btcchina_params = ['market'=>$market];
      $btcchina_url = self::BTCCHINA_LINK;
      $btcchina = $this->okCoin($btcchina_url,$btcchina_params,$this->btcchina_info[0],$this->btcchina_info[1],$this->btcchina_info[2],$api_market_all);
      $btcchina_data[$btcchina_market_diff] = $btcchina;
      return $btcchina_data;
    }

    /*
    *元宝网所有币种价格  $dog_data,$this->chinabtc_market[0],$this->yuanbao_market_diff[3]
    *$btc_data   接受数据数组
    *$api_market_all  当前取出币的种类，并当当前的分类
    */
    public function yuanbaoAll($yuanbao_data,$market,$yuanbao_market_diff)
    {
      $yuanbao_params = [];
      $yuanbao_url = self::YUANBAO_LINK.$market;
      $yuanbao = $this->yuanbaoTicker($yuanbao_url,$yuanbao_params,$this->yuanbao_info[0],$this->yuanbao_info[1].'2cny',$this->yuanbao_info[2],$yuanbao_market_diff,$market);
      $yuanbao_data[$yuanbao_market_diff] = $yuanbao;
      return $yuanbao_data;
    }

    /*
    *比特时代所有币种价格
    *$btc_data   接受数据数组
    *$api_market_all  当前取出币的种类，并当当前的分类
    */
    public function btceraAll($btc_data,$api_market_all,$btcera_market_diff)
    {
      $btcera_params = [
        'c'=>$api_market_all,
        'mk_type'=>self::MK_TYPE.$this->mk_type[0],
      ];
      $btcera_url = self::BTC_LINK;
      $btcEra = $this->okCoin($btcera_url,$btcera_params,$this->btcera_info[0],$this->btcera_info[1].$api_market_all.'cny',$this->btcera_info[2],$api_market_all);
      $btc_data[$btcera_market_diff] = $btcEra;
      return $btc_data;
    }

    /*
    *okcoin     所有币种
    *$market     取那个币的行情
    *$market_btc  当前是那个币
    *return      $data_btc
    */
    public function okcoinALl($okcoin_data,$market,$market_btc,$okcoin_market_diff)
    {
      $okcoin_params = [
      'symbol'=>$market
      ];
      $okcoin_url = self::OKCOIN_LINK;
      $okCoin = $this->okCoin($okcoin_url,$okcoin_params,$this->okcoin_info[0],$this->okcoin_info[1].$market_btc.'.html',$this->okcoin_info[2],$market_btc);
      $okcoin_data[$okcoin_market_diff] = $okCoin;
      return $okcoin_data;
    }

    /*
    *api获取币价格
    *@param sting $url  请求url地址
    *@param sting $params  请求需要参数 
    *@param sting $market_name  交易所名称
    *@param sting $btc_link  当前交易所地址
    *@param sting $market_url  当前币交易k线地址
    *@param sting $market  当前币分类名称
    */
    public function okCoin($url,$params,$market_name,$btc_link,$market_url,$market)
    {
      $data = [];
      $okCoin = $this->sendByCurl($url,'',$params,$timeout='300');
      $okCoin = json_decode($okCoin,true);
      // var_dump($okCoin);die;
      $data[$market] = $okCoin;
      foreach ($data as $key => $value)
      {
        $data[$market]['ticker']['market'] = $market_name;
        $data[$market]['ticker']['k'] = '市场深度';
        $data[$market]['ticker']['url'] = $btc_link;
        $data[$market]['ticker']['market_url'] = $market_url;
      }
      $data =  json_decode(json_encode($data))  ;
      return $data;
    }

    // 国外的单独处理

    public function bitfinex($url,$params,$market_name,$btc_link,$market_url,$market,$api_market_all)
    {
      $data = [];
      $okCoin = $this->sendByIotaCurl($url,'',$params,$timeout='300');
      $okCoin = json_decode($okCoin,true);
      $data[$api_market_all] = $okCoin;
      // var_dump($data);die;
      foreach ($data as $key => $value)
      {
        $data[$api_market_all]['market'] = $market_name;
        $data[$api_market_all]['k'] = '市场深度';
        $data[$api_market_all]['url'] = $btc_link;
        $data[$api_market_all]['market_url'] = $market_url;
      }
      $data =  json_decode(json_encode($data))  ;
      return $data;
    }

    // 元宝
    public function yuanbaoTicker($url,$params,$market_name,$btc_link,$market_url,$market,$api_market_all)
    {
      $data = [];
      $okCoin = $this->sendByIotaCurl($url,'',$params,$timeout='300');
      $okCoin = json_decode($okCoin,true);
      $data[$api_market_all] = $okCoin;
      // var_dump($data);die;
      foreach ($data as $key => $value)
      {
        $data[$api_market_all]['ticker']['last'] = $value['price'];
        $data[$api_market_all]['ticker']['high'] = $value['max'];
        $data[$api_market_all]['ticker']['low'] = $value['min'];
        $data[$api_market_all]['ticker']['buy'] = $value['buy'];
        $data[$api_market_all]['ticker']['sell'] = $value['sale'];
        $data[$api_market_all]['ticker']['vol'] = $value['volume_24h'];
        $data[$api_market_all]['ticker']['market'] = $market_name;
        $data[$api_market_all]['ticker']['k'] = '市场深度';
        $data[$api_market_all]['ticker']['url'] = $btc_link;
        $data[$api_market_all]['ticker']['market_url'] = $market_url;
      }
      $data =  json_decode(json_encode($data))  ;
      return $data;
    }

    // 火币网  /形式请求
    public function huobiGetAll($url,$params,$market_name,$btc_link,$market_url,$market)
    {
      $data = [];
      $okCoin = $this->sendByIotaCurl($url,'',$params,$timeout='300');
      $okCoin = json_decode($okCoin,true);
      $data[$market] = $okCoin;
      foreach ($data as $key => $value)
      {
        $data[$market]['ticker']['market'] = $market_name;
        $data[$market]['ticker']['k'] = '市场深度';
        $data[$market]['ticker']['url'] = $btc_link;
        $data[$market]['ticker']['market_url'] = $market_url;
      }
      $data =  json_decode(json_encode($data))  ;
      return $data;
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

    // iota  get访问不是？形式
    private static function sendByIotaCurl($url, $mode, $params = '', $timeout = 100){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); //设置超时时间
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回原生输出

        if ($mode == 'post') {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
            curl_setopt($ch, CURLOPT_POST, true); //发送一个常规的POST请求
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //全部数据使用HTTP协议中的"POST"操作来发送
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
