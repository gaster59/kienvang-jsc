<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\JobRepository;
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

    public function __construct(JobRepository $jobRepository, CompaniesRepository $companiesRepository, BannerRepository $bannerRepository
    )
    {
        $this->jobRepository = $jobRepository;
        $this->companiesRepository = $companiesRepository;
        $this->bannerRepository = $bannerRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->getJobAboutNum(1, 6);
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        /**
         * Banner Slider
         */
        $slider = $this->bannerRepository->getBannerAboutNum(3, array('title', 'description', 'avatar'));
        return view('index.index',[
            'slider'   => $slider,
            'jobs' => $jobs,
            'companies' => $companies
        ]);
    }
}