<?php

namespace App\Http\Controllers;

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

    public function __construct(JobRepository $jobRepository, CompaniesRepository $companiesRepository)
    {
        $this->jobRepository = $jobRepository;
        $this->companiesRepository = $companiesRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->getJobAboutNum(1, 6);
        $companies = $this->companiesRepository->getCompanyAboutNum(1, 3);
//        dd($companies);
        return view('index.index',[
            'jobs' => $jobs,
            'companies' => $companies
        ]);
    }
}