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
        $post = array(
            'page'=>1,
            'pageSize'=>10
        );
        $url = 'http://mapi.quintar.com/marketCenter/message/messageList';
        $post=json_encode($post);
        $curl = curl_init();
        $header=array(
            "Accept: application/json",
            "Content-Type: application/json;charset=utf-8"
        );
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_URL, $url);
        $rs = curl_exec($curl);
        $rs = json_decode($rs,true);
        $d=DB::table('articles')->orderBy("id",'desc')->first();
        $array=array();
        foreach (array_reverse($rs['result']) as $key => $value) {

            if(strtotime($value['createTime']) > strtotime($d->created_at)){
                $ret_title = explode('|',$value['title']);
                $array['title']= '比特币小白--'.$ret_title[1];
                $slug = $this->generateRandomString();
                $array['slug']= $slug;
                $array['subtitle']= $value['title'];
                $array['category_id']= '13';//13
                $array['view_count']= rand(123,1000);
                $array['user_id']= 1;
                $num = rand(27,292);
                if($num<150){
                    $page_img_url = 'https://cdn.bsatoshi.com/25hour/'.$num.'.jpeg';
                }else{
                    $page_img_url = 'https://cdn.bsatoshi.com/25hour/'.$num.'.jpg';
                }
                $array['page_image']= $page_img_url;
                $array['last_user_id']= 1;
                $data = [
                    'raw'  => $value['content'],
                    'html' => (new Markdowner)->convertMarkdownToHtml($value['content'])
                ];

                $array['content']= json_encode( $data);
                $array['meta_description']= mb_substr($value['content'],0,124,'utf-8');
                $array['published_at']=  date("Y-m-d H:i:s",strtotime($value['createTime']));
                $array['created_at']=  date("Y-m-d H:i:s",time()) ;

                $return=DB::table('articles')->insertGetId($array);
                $baidu_arr = [
                  'https://www.btxiaobai.com/'.$slug.'.html',
                ];

                $this->addBaidu($baidu_arr);

            }
        }
    }
    //app接口

    public function cdapp()
    {
        header('Access-Control-Allow-Origin:*');
        $pageSize = $_GET['pageSize'] ? $_GET['pageSize'] : 0;

        $columnId = $_GET['columnId'] ? $_GET['columnId'] :  13 ;

        $articles = $this->article->getAppArticle(6, $pageSize,config('blog.article.sort'), config('blog.article.sortColumn'),$columnId);


        $ret_data =   json_decode(json_encode($articles),true);

        foreach ($ret_data['data'] as $key => $value){
            $ret_data['data'][$key]['cover']  = $value['page_image'];
            $ret_data['data'][$key]['comments_count']  = $value['view_count'];
            $ret_data['data'][$key]['post_id']  = $value['id'];
            $ret_data['data'][$key]['author_name']  = 'chuhemiao';
            $ret_data['data'][$key]['article_type']  = $value['category_id'];
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

        $ret_article =   json_decode(json_encode($ret_article),true);

        DB::table('articles')->increment('view_count',rand(5,30));
        return $ret_article['content'];
    }



    //文章接口

    public function  addArticle()
    {

        $url = 'https://app.blockmeta.com/w1/news/list?num=12';
        $ch = curl_init();

        $header=array(
            "Accept: application/json",
            "Content-Type: application/json;charset=utf-8"
        );
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curlRes = curl_exec($ch);
        curl_close($ch);

        $res_data = json_decode($curlRes, true);

        $array=array();
        foreach (array_reverse($res_data['list']) as $key => $value) {

                $array['title']= $value['title'];
                $array['slug']= 'https://www.8btc.com/article/'.$value['id'];
                $array['subtitle']= $value['title'];
                $array['category_id']= '1';//巴比特文章
                $array['view_count']= rand(123,1024);
                $array['user_id']= 1;
                $num = rand(27,292);
                if($num<150){
                    $page_img_url = 'https://cdn.bsatoshi.com/25hour/'.$num.'.jpeg';
                }else{
                    $page_img_url = 'https://cdn.bsatoshi.com/25hour/'.$num.'.jpg';
                }
                $array['page_image']= $page_img_url;
                $array['last_user_id']= 1;
                $data = [
                    'raw'  => $value['desc'],
                    'html' => (new Markdowner)->convertMarkdownToHtml($value['desc'])
                ];

                $array['content']= json_encode( $data);
                $array['meta_description']= $value['desc'];
                $array['published_at']=  date("Y-m-d H:i:s",$value['post_date']);
                $array['created_at']=  date("Y-m-d H:i:s",time()) ;

                $return=DB::table('articles')->insertGetId($array);
               // dd($return);
        };
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

