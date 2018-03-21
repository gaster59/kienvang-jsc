<?php

namespace App\Http\Controllers;

use App\Repositories\CompaniesRepository;
use App\Repositories\BannerRepository;
use App\Http\Requests\UserRequest;

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
    public function checkLogin(UserRequest $request)
    {
        $name = $request->post('name');
        return redirect(route('front.register'));
    }

}