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
        //技术头条
        $tech_articles = $this->article->getHotTechArticle(6,0,1);
        $basic_articles = $this->article->getHotBasicArticle(7,0,1);
        $wallet_articles = $this->article->getHotBasicArticle(8,0,1);
        $ore_articles = $this->article->getHotBasicArticle(9,0,1);

        return view('article.index', compact('articles','hot_articles','new_articles','tech_articles','basic_articles','wallet_articles','ore_articles'));
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
}
