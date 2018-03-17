<?php

namespace App\Http\Controllers;

use App\Repositories\CompaniesRepository;
use App\Repositories\JobRepository;
use Illuminate\Http\Request;
use App\Http\Services\HandleService;

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
     * @var HandleService $handleService;
     */
    var $handleService;

    public function __construct(JobRepository $jobRepository, CompaniesRepository $companiesRepository,
        HandleService $handleService
    )
    {
        $this->jobRepository = $jobRepository;
        $this->companiesRepository = $companiesRepository;

        $this->handleService = $handleService;
    }

    public function index()
    {
        $jobs = $this->jobRepository->getJobAboutNum(1, 6);
        $companies = $this->companiesRepository->getCompanyAboutNum(1, 3);

        $handleService = new HandleService();
        $cutString = $this->handleService->cutString("1111");
//        dd($cutString);

        return view('index.index',[
            'jobs' => $jobs,
            'companies' => $companies
        ]);
    }
}