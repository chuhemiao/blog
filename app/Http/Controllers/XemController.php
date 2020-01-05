<?php

namespace App\Http\Controllers;

use DB;
use App\Services\Markdowner;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class XemController extends Controller
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * Display the articles resource.
     * 
     * @return mixed
     */
    public function index()
    {
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),13);
        return view('article.iotm', compact('articles'));
    }

    public function shell()
    {
        $params = array(
            'first_page'=>true,
            'limit'=>10,
            'cursor'=>'',
            'channel' =>'xiaocong-channel'
        );
        $url = 'https://api.jianyuweb.com/apiv1/content/lives';
        $rs  = $this->sendByCurl($url,'get',$params,'20');

        $rs = json_decode($rs,true);
        $array=array();
        foreach (array_reverse($rs['data']['items']) as $key => $value) {
            $array['title'] = $value['title'];
            $slug = $this->generateRandomString();
            $array['slug'] = $slug;
            $array['subtitle'] = $value['title'];
            $array['category_id'] = '13';//13
            $array['view_count'] = rand(2135, 42948);
            $array['user_id'] = 1;
            $num = rand(27, 292);
            if ($num < 150) {
                $page_img_url = 'https://cdn.bsatoshi.com/25hour/' . $num . '.jpeg';
            } else {
                $page_img_url = 'https://cdn.bsatoshi.com/25hour/' . $num . '.jpg';
            }
            $array['page_image'] = $page_img_url;
            $array['last_user_id'] = 1;

            $data = [
                'raw' => strip_tags($value['content']),
                'html' => (new Markdowner)->convertMarkdownToHtml(strip_tags($value['content']))
            ];

            $array['content'] = json_encode($data);
            $array['meta_description'] = mb_substr($value['content'], 0, 124, 'utf-8');
            $array['published_at'] = date("Y-m-d H:i:s", $value['display_time']);
            $array['created_at'] = date("Y-m-d H:i:s", time());


            $return = DB::table('articles')->insertGetId($array);

            $baidu_arr = [
                'https://www.btxiaobai.com/' . $slug ,
            ];
            $this->addBaidu($baidu_arr);


        }
    }


    //抓取链闻文章

    public function cdarticle()
    {
        $post = array(
            'page'=>1,
            'ts'=>time(),
        );
        $url  =  'https://www.chainnews.com/api/articles';
        $rs = $this->http_data($url,$post,'get');
        $rs = json_decode($rs,true);
        $d=DB::table('articles')->orderBy("id",'desc')->first();
        $array=array();
        $arr_num = [15,14,13,6,7,1];
        foreach (array_reverse($rs['results']) as $key => $value) {
//            if(strtotime($value['created_at']) > strtotime($d->created_at)){
                $array['title']= $value['title'];
                $slug = $this->generateRandomString();
                $array['slug']= $slug;
                $array['subtitle']= $value['digest'];
                $array['category_id']= $arr_num[rand(0,5)];//13
                $array['view_count']= rand(123,3000);
                $array['user_id']= 1;
                $array['page_image']= $value['cover_url'];
                $array['last_user_id']= 1;
                $data = [
                    'raw'  => $value['content'].'<br/>来源：链闻',
                    'html' => (new Markdowner)->convertMarkdownToHtml($value['content'].'<br/>来源：链闻')
                ];
                $array['content']= json_encode( $data);
                $array['meta_description']= $value['digest'];
                $array['published_at']=  date("Y-m-d H:i:s",strtotime($value['created_at']));
                $array['created_at']=  date("Y-m-d H:i:s",time()) ;
                //dd($array);

                DB::table('articles')->insertGetId($array);
                $baidu_arr = [
                    'https://www.btxiaobai.com/' . $slug ,
                ];
                $this->addBaidu($baidu_arr);
//            }
        }


    }
    // coindesk

    public function cdCoindesk()
    {
        $post = array(
            'page'=>1,
            'cn_type'=>1,
        );
        $url  =  'http://api.coindeskchinese.com/article/list';
        $rs = $this->http_data($url,$post,'post');
        $rs = json_decode($rs,true);
        $array=array();
        $arr_num = [15,14,13,6,7,1];
        //dd($rs);
        foreach (array_reverse($rs['data']['items']) as $key => $value) {
            $array['title']= $value['title'];
            $slug = $this->generateRandomString();
            $array['slug']= $slug;
            $array['subtitle']= $value['summary'];
            $array['category_id']= $arr_num[rand(0,5)];//13
            $array['view_count']= rand(1232,30000);
            $array['user_id']= 1;
            $num = rand(27, 292);
            if ($num < 150) {
                $page_img_url = 'https://cdn.bsatoshi.com/25hour/' . $num . '.jpeg';
            } else {
                $page_img_url = 'https://cdn.bsatoshi.com/25hour/' . $num . '.jpg';
            }
            $array['page_image']= $page_img_url;
            $array['last_user_id']= 1;
            $data = [
                'raw'  => $value['content_str'].'<br/>来源：coindesk',
                'html' => (new Markdowner)->convertMarkdownToHtml($value['content_str'].'<br/>来源：coindesk')
            ];
            $array['content']= json_encode( $data);
            $array['meta_description']= $value['summary'];
            $array['published_at']=  date("Y-m-d H:i:s",time());
            $array['created_at']=  date("Y-m-d H:i:s",time()) ;

            DB::table('articles')->insertGetId($array);
            $baidu_arr = [
                'https://www.btxiaobai.com/' . $slug ,
            ];
            $this->addBaidu($baidu_arr);
        }


    }

    //排列组合

    public function cNum()
    {
        $i=0;
        for($a=1; $a<11; $a++){
            for( $b=1 ; $b<11; $b++){
                    if($b==$a) continue;
                    for($c=1; $c<11; $c++){
                        if($c==$b || $c==$a) continue;
                        for($d=1; $d<11; $d++){
                            if($d==$c || $d==$a || $d==$b) continue;
                            for($e=1; $e<11; $e++){
                                if($e==$d || $e==$a || $e==$b || $e==$c) continue;
                                        //$num = $a+$b+$c+$d+$e;
                                        $Stringstr = $a.'+'.$b.'+'.$c.'+'.$d.'+'.$e;
                                        $i++;
                                        echo $Stringstr.'<br/>'.'+';
                            }
                        }
                    }
                }
        }
        echo $i;
    }




    //app接口

    public function cdapp()
    {
        header('Access-Control-Allow-Origin:*');
        $pageSize = $_GET['pageSize'] ? $_GET['pageSize'] : 0;

        $columnId = $_GET['columnId'] ? $_GET['columnId'] :  13 ;

        $articles = $this->article->getAppArticle(15, $pageSize,config('blog.article.sort'), config('blog.article.sortColumn'),$columnId);


        $ret_data =   json_decode(json_encode($articles),true);

        foreach ($ret_data['data'] as $key => $value){
            $ret_data['data'][$key]['cover']  = $value['page_image'];
            $ret_data['data'][$key]['comments_count']  = $value['view_count'];
            $ret_data['data'][$key]['post_id']  = $value['id'];
            $ret_data['data'][$key]['author_name']  = 'chuhemiao';
            //$ret_data['data'][$key]['article_type']  = $value['category_id'];
            switch($value['category_id']){
                case 1:
                    $ret_data['data'][$key]['article_type'] = '精选';
                    break;
                case 14:
                    $ret_data['data'][$key]['article_type'] = '行情';
                    break;
                case 7:
                    $ret_data['data'][$key]['article_type'] = '百科';
                    break;
                case 6:
                    $ret_data['data'][$key]['article_type'] = '深度';
                    break;
                case 5:
                    $ret_data['data'][$key]['article_type'] = '早晚报';
                    break;
                default:
                    $ret_data['data'][$key]['article_type'] = '快讯';
                    break;
            }
        }

        return $ret_data['data'];

    }

    //app 文章详情接口
    public function cdetail()
    {
        header('Access-Control-Allow-Origin:*');
        $slug = $_GET['postId'] ? $_GET['postId'] : 0;
        $ret_article = DB::table('articles')
            ->where('id',$slug)
            ->first();

        $ret_content = [];

        $ret_article =   json_decode(json_encode($ret_article),true);

        DB::table('articles')->increment('view_count',rand(5,30));

        foreach ($ret_article as $k => $v){
            $ret_content[] = $v;
        }
        $ret =  json_decode($ret_content[7],true);
        $ret['title'] = $ret_article['title'];
        $ret['page_image'] = $ret_article['page_image'];

        switch($ret_article['user_id']){
            case 1:
                $ret['source'] = '比特币小白';
                break;
            case 14:
                $ret['source'] = '币聪';
                break;
            case 7:
                $ret['source'] = 'IIB';
                break;
            case 6:
                $ret['source'] = 'chuhemiao';
                break;
            case 5:
                $ret['source'] = '金色';
                break;
            default:
                $ret['source'] = '比特币小白';
                break;
        }
        $ret['created_at'] = $ret_article['created_at'];
        return json_encode($ret);
    }

    public function cdScroll()
    {
        header('Access-Control-Allow-Origin:*');
        // 轮播
        $carousel_list = $this->article->getHotBasicArticle(10,0,5);

        $carousel_list =   json_decode(json_encode($carousel_list),true);

        return $carousel_list;
    }
    //快讯

    public function cdHour()
    {
        header('Access-Control-Allow-Origin:*');
        $pageSize = $_GET['pageSize'] ? $_GET['pageSize'] : 0;

        $articles = $this->article->getAppArticle(20, $pageSize,config('blog.article.sort'), config('blog.article.sortColumn'),13);

        $ret_data =   json_decode(json_encode($articles),true);

        foreach ($ret_data['data'] as $key => $value){
            $ret_data['data'][$key]['content']  = json_decode($value['content'],true);
        }


        return $ret_data;

    }
    //  收信接口

    public function receiveLetter()
    {
        header('Access-Control-Allow-Origin:*');



        if(!$_GET['receive_letter_email'] && !$_GET['receive_address_province'] && !$_GET['receive_address_detail']){
            $array = [
                'code'=>1,
                'data'=>'',
                'msg'=>'参数不能为空'
            ];
            return  json_encode($array);
        }

        $detail_arr  =  explode(',',$_GET['receive_address_detail']);

        $detail_str = $detail_arr[0].$detail_arr[1].$detail_arr[2];

        $array_type = [];

        $array_type['receive_letter_email'] = $_GET['receive_letter_email'];
        $array_type['receive_address_province'] = $_GET['receive_address_province'];
        $array_type['receive_address_detail'] = $detail_str;
        $array_type['receive_city'] = $_GET['receive_city'];
        $array_type['contact_infor'] = $_GET['contact_infor'];
        $array_type['lover_letter'] = $_GET['lover_letter'];
        $array_type['status'] = $_GET['status']  ?  1 : 0;
        $array_type['created_at'] = date('Y-m-d H:i:s',time());

        $return = DB::table('jianxin_write')->insertGetId($array_type);

        if(!$return){
            $array = [
                'code'=>$return,
                'data'=>'',
                'msg'=>'发信失败'
            ];
            return json_encode($array);
        }
        $array = [
            'code'=>$return,
            'data'=>'',
            'msg'=>'提交成功，请等待上门揽信'
        ];

        return json_encode($array);

    }

    // 发信接口

    public function sendLetter()
    {
        header('Access-Control-Allow-Origin:*');

        if(!$_GET['send_letter_email'] && !$_GET['send_address_province'] && !$_GET['send_address_detail']){
            $array = [
                'code'=>1,
                'data'=>'',
                'msg'=>'参数不能为空'
            ];
            return  json_encode($array);
        }

        $detail_arr  =  explode(',',$_GET['send_address_detail']);

        $detail_str = $detail_arr[0].$detail_arr[1].$detail_arr[2];

        $array_type = [];

        $array_type['send_letter_email'] = $_GET['send_letter_email'];
        $array_type['send_address_province'] = $_GET['send_address_province'];
        $array_type['send_address_detail'] = $detail_str;
        $array_type['send_city'] = $_GET['send_city'];
        $array_type['contact_infor'] = $_GET['contact_infor'];
        $array_type['lover_letter'] = $_GET['lover_letter'];
        $array_type['status'] = $_GET['status']  ?  1 : 0;
        $array_type['created_at'] = date('Y-m-d H:i:s',time());

        $return = DB::table('jianxin_send')->insertGetId($array_type);

        if(!$return){
            $array = [
                'code'=>$return,
                'data'=>'',
                'msg'=>'收信失败'
            ];
            return json_encode($array);
        }
        $array = [
            'code'=>$return,
            'data'=>'',
            'msg'=>'提交成功，请等待收信'
        ];

        return json_encode($array);


    }
    // 揽收数量接口

    public function  getCountLetter()
    {
        header('Access-Control-Allow-Origin:*');


        $ret_write = DB::table('jianxin_write')
            ->where('is_collect','=' ,0)
            ->get();
        $ret_send = DB::table('jianxin_send')
            ->where('is_send','=' ,1)
            ->get();

        if(count($ret_write) > 0 || count($ret_send)>0 ){
            $array = [
                'code'=>1,
                'data'=>[
                    'write_num' => count($ret_write),
                    'send_num' => count($ret_send),
                ],
                'msg'=>'返回当前收发信数据'
            ];
            return json_encode($array);
        }else{
            $array = [
                'code'=>1,
                'data'=>[
                    'write_num' => 0,
                    'send_num' => 0,
                ],
                'msg'=>'发信数据'
            ];
            return json_encode($array);
        }

    }


    // 获取期货交易数据

    public function qhData()
    {

        $params=[

        ];
        $url = 'http://www.shfe.com.cn/data/dailydata/kx/pm20191008.dat';

        $rs  = $this->sendByCurl($url,'get',$params,'20');

        $ret_data =   json_decode($rs,true);


        foreach ($ret_data['o_cursor'] as $key => $v){
            if(strpos($v['INSTRUMENTID'],'all')){
                // 当前分类是输入哪个
                $array_type = [];
                $array_type['product_name'] = $v['PRODUCTNAME'];
                $array_type['created_at'] = $ret_data['report_date'];
                if($v['RANK'] < 0){
                    $array_type['company_name'] = '1';
                }else{
                    $array_type['company_name'] = '2';
                }
                $array_type['cj_1'] = $v['CJ1'];
                $array_type['cj1_chg'] = $v['CJ1_CHG'];
                $array_type['cj_2'] = $v['CJ2'];
                $array_type['cj2_chg'] = $v['CJ2_CHG'];
                $array_type['cj_3'] = $v['CJ3'];
                $array_type['cj3_chg'] = $v['CJ3_CHG'];
                $array_type['instrumentid'] = $v['INSTRUMENTID'];
                $array_type['productsortno'] = $v['PRODUCTSORTNO'];
                $return = DB::table('qihuo_company_type')->insertGetId($array_type);
                if($return){
                   echo "插入数据成功";
                }else{
                    echo "插入数据失败";
                }
            }else{
                // 当前分类是输入哪个
                $array = [];
                $array['productsortno'] = $v['PRODUCTSORTNO'] ? $v['PRODUCTSORTNO'] : 0;
                $array['product_rank'] = $v['RANK'] ? $v['RANK'] : -1 ;
                $array['created_at'] = $ret_data['report_date'];
                $array['cj1'] = $v['CJ1'] ? $v['CJ1']:0;
                $array['cj1_chg'] = $v['CJ1_CHG'] ? $v['CJ1_CHG'] : 0 ;
                $array['cj2'] = $v['CJ2'] ? $v['CJ2'] : 0 ;
                $array['cj2_chg'] = $v['CJ2_CHG'] ? $v['CJ2_CHG'] : 0 ;
                $array['cj3'] = $v['CJ3'] ? $v['CJ3'] : 0;
                $array['cj3_chg'] = $v['CJ3_CHG'] ? $v['CJ3_CHG'] : 0;
                $array['participantid1'] =  $v['PARTICIPANTID1'] ?  $v['PARTICIPANTID1'] : 0 ;
                $array['participantid2'] = $v['PARTICIPANTID2'] ? $v['PARTICIPANTID2'] : 0 ;
                $array['participantid3'] = $v['PARTICIPANTID3'] ? $v['PARTICIPANTID3'] :0;
                $array['participantabbr1'] = $v['PARTICIPANTABBR1'] ? $v['PARTICIPANTABBR1'] : 0 ;
                $array['participantabbr2'] = $v['PARTICIPANTABBR2'] ? $v['PARTICIPANTABBR2'] : 0 ;
                $array['participantabbr3'] = $v['PARTICIPANTABBR3'] ? $v['PARTICIPANTABBR3'] : 0 ;
                $array['instrumentid'] = $v['INSTRUMENTID'] ? $v['INSTRUMENTID'] :0;
                $array['productname'] = $v['PRODUCTNAME'];
                $return = DB::table('qihuo_data_rank')->insertGetId($array);
                if($return){
                    echo "插入数据成功222";
                }else{
                    echo "插入数据失败222";
                }
            }
        }
    }
    // 日交易快讯 shfe

    public function qhHourData()
    {

        $params=[

        ];
        $url = 'http://www.shfe.com.cn/data/dailydata/kx/kx20191008.dat';

        $rs  = $this->sendByCurl($url,'get',$params,'20');

        $ret_data =   json_decode($rs,true);

        foreach ($ret_data['o_curinstrument'] as $key => $v){
                // 当前分类是输入哪个
                if($v['ORDERNO2'] <= 0 ){
                    $array_type = [];
                    $array_type['created_at'] = $ret_data['report_date'];
                    $array_type['productsortno'] = $v['PRODUCTSORTNO'] ? $v['PRODUCTSORTNO']:0;
                    $array_type['productid'] = $v['PRODUCTID'] ? $v['PRODUCTID']:0;
                    $array_type['deliverymonth'] = $v['DELIVERYMONTH'] ? $v['DELIVERYMONTH'] : 0 ;
                    $array_type['presettlementprice'] = $v['PRESETTLEMENTPRICE'] ? $v['PRESETTLEMENTPRICE'] : 0 ;
                    $array_type['openprice'] = $v['OPENPRICE'] ? $v['OPENPRICE'] : 0 ;
                    $array_type['highestprice'] = $v['HIGHESTPRICE'] ? $v['HIGHESTPRICE'] : 0 ;
                    $array_type['lowestprice'] = $v['LOWESTPRICE'] ? $v['LOWESTPRICE'] : 0 ;
                    $array_type['closeprice'] = $v['CLOSEPRICE'] ? $v['CLOSEPRICE'] : 0 ;
                    $array_type['settlementprice'] = $v['SETTLEMENTPRICE'] ? $v['SETTLEMENTPRICE'] : 0 ;
                    $array_type['zd1_chg'] = $v['ZD1_CHG'] ? $v['ZD1_CHG'] : 0 ;
                    $array_type['zd2_chg'] = $v['ZD2_CHG'] ? $v['ZD2_CHG'] : 0 ;
                    $array_type['volume'] = $v['VOLUME'] ? $v['VOLUME'] : 0 ;
                    $array_type['openinterest'] = $v['OPENINTEREST'] ? $v['OPENINTEREST'] : 0 ;
                    $array_type['openinterestchg'] = $v['OPENINTERESTCHG'] ? $v['OPENINTERESTCHG'] : 0 ;
                    $array_type['orderno2'] = $v['ORDERNO2'] ? $v['ORDERNO2'] : 0 ;
                    $array_type['orderno'] = $v['ORDERNO'] ? $v['ORDERNO'] : 0 ;
                    $array_type['productname'] = $v['PRODUCTNAME'] ? $v['PRODUCTNAME'] : 0 ;

                    $return = DB::table('qihuo_data_kx')->insertGetId($array_type);
                    if($return){
                        echo "插入数据成功";
                    }else{
                        echo "插入数据失败";
                    }
                }

        }
    }


    public function cdTranslate($namespace = null)
    {
        $xx = '2';
        $a = $xx ?: [];

        echo $a;

        // 设置请求数据
        static $guid = '';
        $uid = uniqid ( "", true );

        $data = $namespace;
        $data .= $_SERVER ['REQUEST_TIME'];     // 请求那一刻的时间戳
        $data .= $_SERVER ['HTTP_USER_AGENT'];  // 获取访问者在用什么操作系统
        $data .= $_SERVER ['SERVER_ADDR'];      // 服务器IP
        $data .= $_SERVER ['SERVER_PORT'];      // 端口号
        $data .= $_SERVER ['REMOTE_ADDR'];      // 远程IP
        $data .= $_SERVER ['REMOTE_PORT'];      // 端口信息

        $hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );
        $guid = '{' . substr ( $hash, 0, 8 ) . '-' . substr ( $hash, 8, 4 ) . '-' . substr ( $hash, 12, 4 ) . '-' . substr ( $hash, 16, 4 ) . '-' . substr ( $hash, 20, 12 ) . '}';

        return $guid;


    }

    function getReqSign($params /* 关联数组 */, $appkey /* 字符串*/)
    {
        // 1. 字典升序排序
        ksort($params);

        // 2. 拼按URL键值对
        $str = '';
        foreach ($params as $key => $value)
        {
            if ($value !== '')
            {
                $str .= $key . '=' . urlencode($value) . '&';
            }
        }

        // 3. 拼接app_key
        $str .= 'app_key=' . $appkey;

        // 4. MD5运算+转换大写，得到请求签名
        $sign = strtoupper(md5($str));
        return $sign;
    }

    function doHttpPost($url, $params)
    {
        $curl = curl_init();

        $response = false;
        do
        {
            // 1. 设置HTTP URL (API地址)
            curl_setopt($curl, CURLOPT_URL, $url);

            // 2. 设置HTTP HEADER (表单POST)
            $head = array(
                'Content-Type: application/x-www-form-urlencoded'
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $head);

            // 3. 设置HTTP BODY (URL键值对)
            $body = http_build_query($params);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

            // 4. 调用API，获取响应结果
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_NOBODY, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            if ($response === false)
            {
                $response = false;
                break;
            }

            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($code != 200)
            {
                $response = false;
                break;
            }
        } while (0);

        curl_close($curl);
        return $response;
    }



    //xiaomao jia

    public function  addDailybtc()
    {

        $params=[
            'page'=>$_GET['page'],
        ];

        $url  =  'http://www.xiaomaojia.com/wp-json/wp/v2/posts';


        $rs = $this->http_data($url,$params,'get');
        $rs = json_decode($rs,true);

        //dd($rs);
        $arr_num = [15,14,13,6,7,1];

        $array=array();
        foreach (array_reverse($rs) as $key => $value) {


            $array['title']= $value['title']['rendered'];
            $slug = $this->generateRandomString();
            $array['slug']= $slug;
            $array['subtitle']= $value['excerpt']['rendered'];
            $array['category_id']= $arr_num[rand(0,5)];//巴比特文章
            $array['view_count']= rand(1754,38945);
            $array['user_id']= 1;
            $num = rand(27,292);
            if($num<150){
                $page_img_url = 'https://cdn.bsatoshi.com/25hour/'.$num.'.jpeg';
            }else{
                $page_img_url = 'https://cdn.bsatoshi.com/25hour/'.$num.'.jpg';
            }
            $array['page_image']= $page_img_url;
            $array['last_user_id']= 1;
            // 去除末尾的广告
            $content = str_replace('http://www.xiaomaojia.com/ex/dragonex.html','https://www.dailybtc.cn/category/anasys/',$value['content']['rendered']) ;
            if($content){
                $content_res = str_replace('http://www.xiaomaojia.com/ex/binance.html','https://www.dailybtc.cn/special/defi-dapp/',$content) ;
                $content_ret = str_replace('http://www.xiaomaojia.com/ex/gateio.html','https://www.dailybtc.cn/category/coin-intro/',$content_res) ;
            }else{
                $content_ret = $value['content']['rendered'];
            }
           
            $data = [
                'raw'  => (new Markdowner)->convertMarkdownToHtml($content_ret),
                'html' => (new Markdowner)->convertMarkdownToHtml($content_ret)
            ];

            $array['content']= json_encode( $data);
            $array['meta_description']= $value['excerpt']['rendered'];
            $array['published_at']=  $value['date'];
            $array['created_at']=  date("Y-m-d H:i:s",time()) ;
            $return=DB::table('articles')->insertGetId($array);
            $baidu_arr = [
                'https://www.btxiaobai.com/' . $slug ,
            ];
            $this->addBaidu($baidu_arr);

        }
    }

    // 获取毫秒

    function msectime()
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }


    /**
     * 从给定的url获取html内容
     *
     * @param string $url
     * @return string
     */
    function _getUrlContent($url){
        $handle = fopen($url, "r");
        if($handle){
            $content = stream_get_contents($handle,1024*1024);
            return $content;
        }else{
            return false;
        }
    }

    //生成随机字符串

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    // excel 郑州数据

    public function getExcelCzce()
    {



        $params = [
            'dayQuotes.variety'=> 'all',
            'dayQuotes.trade_type'=> 0,
            'year'=> 2019,
            'month'=> '9',
            'day'=> '08'
        ];

        $t_url = 'http://www.dce.com.cn/publicweb/quotesdata/dayQuotesCh.html';


        $rs = $this->http_data($t_url,$params,'get');

        //匹配详情内容
        $pattern = '/<div class="dataArea">(.+?)<\/div>/is';
        preg_match($pattern, $rs, $match);

        print_r($match);


    }

    //提交到百度

    public function addBaidu($urls)
    {
        $api = 'http://data.zz.baidu.com/urls?site=https://www.btxiaobai.com&token=veiJlvUY2TjvVdHc';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result= curl_exec($ch);
        return $result;
    }

    public function http_data($url,Array $data,$method='get')
    {
        $time_out = 30;//超时时间

        $data_query = http_build_query($data);
        if('post' == strtolower($method))
        {
            $opts = array(
                'http'=>array(
                    'method'=>"POST",
                    'timeout'=>$time_out,
                    'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
                        "Content-length:".strlen($data_query)."\r\n",
                    'content' => $data_query,
                )
            );
            $format_url = $url;
        }
        else
        {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'timeout'=>$time_out,
                )
            );
            $format_url = $url . (strpos($url,'?')===false ? ('?'.$data_query) : ('&' . $data_query));
        }
        $cxContext = stream_context_create($opts);
        $response = file_get_contents($format_url, false, $cxContext);
        return $response;
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

