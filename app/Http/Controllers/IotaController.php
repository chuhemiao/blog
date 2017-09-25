<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class IotaController extends Controller
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
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),2);
        return view('article.iotm', compact('articles'));
    }

    /**
     * everyweek articles resource.
     * 
     * @return mixed
     */
    public function everyweek()
    {
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),5);
        return view('article.iotm', compact('articles'));
    }

    /**
     * bitetech articles resource.
     * 
     * @return mixed
     */
    public function bitetech()
    {
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),6);
        return view('article.iotm', compact('articles'));
    }

    /**
     * Bite Basic articles resource.
     * 
     * @return mixed
     */
    public function bitebasic()
    {
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),7);
        return view('article.iotm', compact('articles'));
    }

    /**
     * Bite wallet articles resource.
     * 
     * @return mixed
     */
    public function wallet()
    {
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),8);
        return view('article.iotm', compact('articles'));
    }
    /**
     * Bite ore articles resource.
     * 
     * @return mixed
     */
    public function ore()
    {
        $articles = $this->article->getCateLog(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'),9);
        return view('article.iotm', compact('articles'));
    }

    public function pushbai()
    {
        $urls = array(
            'https://www.btxiaobai.com/laboratory-established.html',
            'https://www.btxiaobai.com/mexico-seeks-fintech-regulation.html',
            'https://www.btxiaobai.com/btc-ltc.html',
            'https://www.btxiaobai.com/67blockchain-finextra.html',
            'https://www.btxiaobai.com/mining-drugs.html',
            'https://www.btxiaobai.com/etfevolve.html',
            'https://www.btxiaobai.com/global-brain.html',
            'https://www.btxiaobai.com/nikkei-asian-review.html',
        );
        $api = 'http://data.zz.baidu.com/urls?site=https://www.btxiaobai.com/&token=veiJlvUY2TjvVdHc&type=realtime';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        echo $result;
    }
}

