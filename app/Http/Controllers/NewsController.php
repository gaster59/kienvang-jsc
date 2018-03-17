<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;

class NewsController extends Controller
{

    /**
     * @var NewsRepository $newsRepository
     */
    var $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $news = $this->newsRepository->getNews(1, 10);
        return view('news.index',[
            'news' => $news,
        ]);
    }

    public function detail($id, $slug)
    {
        if (!is_numeric($id)) {
            return redirect(route('front.news'));
        }
        if (is_null($slug)) {
            return redirect(route('front.news'));
        }

        $dataNews = $this->newsRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);
        if (count($dataNews) == 0) {
            return redirect(route('front.news'));
        }

        /**
         * List news
         */
        $arr = [['news.type', '=', '1'],['news.status', '=', '1'],['id', '<>', $id]];
        $newsList = $this->newsRepository->getNewsCustomize( $arr  , 10);
        return view('news.detail', [
            'dataNews'  => $dataNews[0],
            'newsList'  => $newsList
        ]);


    }
}