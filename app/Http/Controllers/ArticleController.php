<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
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
        $articles = $this->article->page(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'));
        //最新
        $new_articles = $this->article->getNewArticle();
        //最热
        $hot_articles = $this->article->getHotArticle();
        //每日热点
        $everyday_articles = $this->article->getHotBasicArticle(1,0,20);
        // 评测
        $bitcoin_pingce = $this->article->getHotBasicArticle(4,0,5);
        // 轮播
        $carousel_list = $this->article->getHotBasicArticle(10,0,5);

        $ret_hour = $this->hour(22);

//        dd($articles);

        return view('article.index', compact('articles','hot_articles','new_articles','everyday_articles','bitcoin_pingce','carousel_list','ret_hour'));
    }

    /**
     * Display the article resource by article slug.
     * 
     * @param  string $slug
     * @return mixed
     */
    public function show($slug)
    {
        $article = $this->article->getBySlug($slug);

//        $article->content = collect(json_decode($article->content))->get('html');
        // var_dump($article);die;
        return view('article.show', compact('article'));
    }

    public function hour($list){
        $url = 'https://api.jinse.com/live/list?limit='.$list;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $curlRes = curl_exec($ch);
        curl_close($ch);
        $json=json_decode($curlRes, true);
        return $json;
    }
}
