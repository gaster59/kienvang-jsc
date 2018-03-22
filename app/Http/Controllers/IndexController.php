<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\JobRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * @var JobRepository $jobRepository
     */
    var $jobRepository;

    /**
     * @var CompaniesRepository $companiesRepository
     */
    var $companiesRepository;

    /**
     * @var BannerRepository $bannerRepository
     */
    var $bannerRepository;

    /**
     * @var NewsRepository $newsRepository
     */
    var $newsRepository;


    public function __construct(JobRepository $jobRepository, CompaniesRepository $companiesRepository, BannerRepository $bannerRepository, NewsRepository $newsRepository
    )
    {
        $this->jobRepository = $jobRepository;
        $this->companiesRepository = $companiesRepository;
        $this->bannerRepository = $bannerRepository;
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->getJobAboutNum(1, 20);
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        /**
         * Banner Slider
         */
        $slider = $this->bannerRepository->getBannerAboutNum(3, array('title', 'description', 'avatar'));

        //News
        $news = $this->newsRepository->getNews(1, 5);
        return view('index.index',[
            'slider'   => $slider,
            'jobs' => $jobs,
            'companies' => $companies,
            'news'      => $news
        ]);
    }
}