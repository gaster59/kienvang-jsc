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
            redirect(route('front.news'));
        }
        if (is_null($slug)) {
            redirect(route('front.news'));
        }

        $news = $this->newsRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);
        if (count($news) == 0) {
            // tin khong ton tai
            return view('sdasdas', [
                'asdasd' => 'sadasd'
            ]);
        }

        // tin ton tai
        return view('adasd', [
            'dsadas' => 'dasdasd'
        ]);


    }
}