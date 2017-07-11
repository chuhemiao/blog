<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class IcoController extends Controller
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
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),4);
        return view('article.iotm', compact('articles'));
    }
}

