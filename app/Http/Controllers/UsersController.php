<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompaniesRepository;
use App\Repositories\BannerRepository;
use App\Repositories\UserRepository;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Validator;

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

    /**
     * @var UserRepository $userRepository
     */
    var $userRepository;

    public function __construct( CompaniesRepository $companiesRepository, BannerRepository $bannerMain, UserRepository $userRepository)
    {
        $this->companiesRepository = $companiesRepository;
        $this->bannerMain = $bannerMain;
        $this->userRepository = $userRepository;
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
    public function checkRegister(UserRequest $request)
    {
        $name           = $request->post('name');
        $email          = $request->post('email');
        $address        = $request->post('address', '');
        $birthday       = $request->post('birthday', '');
        $phone          = $request->post('phone');
        $city           = $request->post('city','');
        $state          = $request->post('state','');
        $password       = $request->post('password');
        $password_con   = $request->post('password_confirmation');
        $gender         = $request->post('gender', 1);
        $couple         = $request->post('couple', 0);
        $academiccareer = $request->post('academiccareer',2);
        $school         = $request->post('school','');
        $major          = $request->post('major','');
        $qualifications = $request->post('qualifications','');

        $info = array(
            'city'          => $city,
            'state'         => $state,
            'academiccareer'=> $academiccareer,
            'school'        => $school,
            'major'         => $major,
            'qualifications'=> $qualifications
        );
        $user = [
            'name'          => $name,
            'email'         => $email,
            'password'      => bcrypt($password),
            'address'       => $address,
            'phone'         => $phone,
            'status'        => 2,
            'birthday'      => $birthday,
            'gender'        => $gender,
            'couple'        => $couple,
            'info'          => json_encode($info),
            'remember_token'=> '',
            'created_at'    => date("Y-m-d H:i:s"),

        ];//dd($user);
        $this->userRepository->create($user);
        $request->session()->flash('alert-success', 'Đăng ký tài khoản thành công');
        return redirect(route('front.register'));
    }
    public function login(Request $request)
    {

        $rules = [
            'email'        => 'required|email',
            'password'     => 'required|min:8',
        ];
        $message = [
            'email.required'    => "Nhap email",
            'email.email'       => "Khong dung dih dang",
            'password.required' => "Nhap pass",
            'password.min'      => "8 ki tu"
        ];

        $validator = Validator::make($request->all(), $rules, $me);
        if($validator->fails()){
return response()->json([
            'error' => true,
            'message'=> "djdaj jda"
        ], 200);
        }else{
            return response()->json([
            'error' => true,
            'message'=> "djdaj jda"
        ], 200);
        }

        

    }

}