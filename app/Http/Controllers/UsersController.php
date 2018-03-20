<?php

namespace App\Http\Controllers;

use App\Repositories\CompaniesRepository;
use App\Repositories\BannerRepository;

class UsersController extends Controller
{

    /**
     * @var CompaniesRepository $companiesRepository
     */
    var $companiesRepository;

    /**
     * @var BannerRepository $bannerRepository
     */
    var $bannerMain;

    public function __construct( CompaniesRepository $companiesRepository, BannerRepository $bannerMain)
    {
        $this->companiesRepository = $companiesRepository;
        $this->bannerMain = $bannerMain;
    }

    public function index()
    {
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        //Banner main
        $w = [['banners.type', '=', '2']];
        $bannerMain = $this->bannerMain->getBannerMain($w);
        return view('users.index',[
            'companies' => $companies,
            'bannerMain'=> $bannerMain
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
        $w = [['banners.type', '=', '2']];
        $bannerMain = $this->bannerMain->getBannerMain($w);
        return view('news.detail', [
            'dataNews'  => $dataNews[0],
            'newsList'  => $newsList,
            'companies' => $companies,
            'bannerMain'=> $bannerMain
        ]);


    }
}