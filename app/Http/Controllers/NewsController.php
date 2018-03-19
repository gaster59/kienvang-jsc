<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use App\Repositories\CompaniesRepository;

class NewsController extends Controller
{

    /**
     * @var NewsRepository $newsRepository
     */
    var $newsRepository;

    /**
     * @var CompaniesRepository $companiesRepository
     */
    var $companiesRepository;

    public function __construct(NewsRepository $newsRepository, CompaniesRepository $companiesRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->companiesRepository = $companiesRepository;
    }

    public function index()
    {
        $news = $this->newsRepository->getNews(1, 10);
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        return view('news.index',[
            'news' => $news,
            'companies' => $companies
        ]);
    }

    public function detail($id, $slug=null)
    {
        if (!is_numeric($id)) {
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
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        return view('news.detail', [
            'dataNews'  => $dataNews[0],
            'newsList'  => $newsList,
            'companies' => $companies
        ]);


    }
}