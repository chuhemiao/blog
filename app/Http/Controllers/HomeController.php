<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class HomeController extends Controller
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * Display the dashboard page.
     * 
     * @return mixed
     */
    public function dashboard()
    {
        return view('dashboard.index');
    }

    /**
     * Search the article by keyword.
     * 
     * @param  Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $key = trim($request->get('q'));

        $articles = $this->article->search($key);
        $ret_hour = $this->hour(22);

        return view('search', compact('articles','ret_hour'));
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
