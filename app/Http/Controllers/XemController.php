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


}

