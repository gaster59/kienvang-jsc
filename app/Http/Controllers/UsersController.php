<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class UsersController extends Controller
{

    /**
     * @var UserRepository $userRepository
     */
    var $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $status = $user['status'];
            if ($status == 1) {
                return redirect(route('category'));
            }elseif($status == 2){
                return redirect(route('front.userinfo'));
            }
        }
        return view('users.index');
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
        $cv             = $request->file('cv');
        $destination    = public_path('/cv');

        $info = array(
            'city'          => $city,
            'state'         => $state,
            'academiccareer'=> $academiccareer,
            'school'        => $school,
            'major'         => $major,
            'qualifications'=> $qualifications
        );
        $fileName = '';
        if (!is_null($cv)) {
            $fileName = str_slug($name, '_')."_".date("Y-m-d").'.'.$cv->getClientOriginalExtension();
        }
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
            'cv'            => $fileName,
            'remember_token'=> '',
            'created_at'    => date("Y-m-d H:i:s"),

        ];//dd($user);
        $this->userRepository->create($user);
        if(!empty($fileName)){
            $cv->move($destination, $fileName);
        }
        $request->session()->flash('alert-success', 'Đăng ký tài khoản thành công');
        return redirect(route('front.register'));
    }
    /*public function getLogin(){
        //return view('users.login');
        $arr = [['companies.status', '=', '1'], ['companies.is_home', '=', '1']];
        $companies = $this->companiesRepository->getAllCompanyCustomize($arr);
        //Banner main
        $w = [['banners.type', '=', '2']];
        $bannerMain = $this->bannerMain->getBannerMain($w);
        return view('users.login',[
            'companies' => $companies,
            'bannerMain'=> $bannerMain
        ]);
    }*/
    public function postLogin(Request $request)
    {
        $rules = [
            'email'        => 'required|email',
            'password'     => 'required|min:8',
        ];
        $message = [
            'email.required'    => "Vui lòng nhập email",
            'email.email'       => "Email không đúng định dạng",
            'password.required' => "Vui lòng nhập mật khẩu",
            'password.min'      => "Mật khẩu phải từ 8 kí tự trở lên"
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message'=> $validator->errors()
                ], 200);
        }else{
            $email          = $request->post('email');
            $password          = $request->post('password');
            if (Auth::attempt(['email' => $email,'password' => $password,'status' => 2], true)) {
                return response()->json([
                    'error' => false,
                    'message'=> "success"
                ], 200);
            } else {
                $error = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return response()->json([
                    'error' => true,
                    'message'=> $error
                ], 200);
            }
        }

    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('front.index');
    }
    public function getUserinfo(){
        if (Auth::check()) {
            $user = Auth::user();
            $status = $user['status'];
            if ($status == 1) {
                return redirect(route('category'));
            }

            $info = json_decode($user->info);
            unset($user['info']);
            //dd($info);
            $user['info'] = $info;
            //echo $info->academiccareer;exit;
            return view('users.userinfo', [
                'user'      => $user
            ]);
        }else{
            return redirect(route('front.index'));
        }
    }
    public function postUserinfo(UserRequest $request){
        dd($request->all);
    }

}