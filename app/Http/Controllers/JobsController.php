<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository;
use App\Repositories\CompaniesRepository;
use App\Repositories\BannerRepository;

class JobsController extends Controller
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
    var $bannerMain;

    public function __construct(JobRepository $jobRepository, CompaniesRepository $companiesRepository, BannerRepository $bannerMain)
    {
        $this->jobRepository = $jobRepository;
        $this->companiesRepository = $companiesRepository;
        $this->bannerMain = $bannerMain;
    }

    public function detail($id, $slug=null)
    {
        if (!is_numeric($id)) {
            return redirect(route('front.index'));
        }

        $dataJob = $this->jobRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);
        if (count($dataJob) == 0) {
            return redirect(route('front.index'));
        }

        /**
         * List news
         */
        $ar = [['jobs.status', '=', '1'],['jobs.id', '<>', $id]];
        $jobsList = $this->jobRepository->getNewsCustomize( $ar  , 10);
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        $w = [['banners.type', '=', '2']];
        $bannerMain = $this->bannerMain->getBannerMain($w);
        return view('jobs.detail', [
            'dataJob'  => $dataJob[0],
            'jobsList'  => $jobsList,
            'companies' => $companies,
            'bannerMain'=> $bannerMain
        ]);
    }
}