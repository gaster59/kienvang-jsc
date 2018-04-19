<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\JobRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * @var JobRepository $jobRepository
     */
    var $jobRepository;


    /**
     * @var BannerRepository $bannerRepository
     */
    var $bannerRepository;

    /**
     * @var NewsRepository $newsRepository
     */
    var $newsRepository;


    public function __construct(JobRepository $jobRepository, BannerRepository $bannerRepository, NewsRepository $newsRepository
    )
    {
        $this->jobRepository = $jobRepository;
        $this->bannerRepository = $bannerRepository;
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->getJobAboutNum(1, 20);
        /**
         * Banner Slider
         */
        $slider = $this->bannerRepository->getBannerAboutNum(20, array('title', 'description', 'avatar'));

        //News
        $news = $this->newsRepository->getNews(1, 5);
        return view('index.index',[
            'slider'   => $slider,
            'jobs' => $jobs,
            'news'      => $news
        ]);
    }
    public function about(){
        $about = DB::table('pages')->where('id', 2)->first();
        return view('index.about', ['about'=> $about]);
    }
    public function getContact(){
        return view('index.contact');
    }
    public function postContact(Request $request)
    {
        $rules = [
            'email'             => 'required|email',
            'phone'             => 'required|numeric|phone',
            'name'              => 'required',
            'message'           => 'required'
        ];
        $message = [
            'email.required'    => "Vui lòng nhập email",
            'email.email'       => "Email không đúng định dạng",
            'phone.required'    => "Nhập số điện thoại của bạn",
            'phone.numeric'     => "Số điện thoại không đúng",
            'name.required'     => "Vui lòng nhập tên",
            'message.required'  => "Vui lòng nhập nội dung liên hệ"
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $name           = $request->post('name');
            $email          = $request->post('email');
            $phone          = $request->post('phone');
            $message        = $request->post('message', '');
            $contact = [
                'name'          => $name,
                'email'         => $email,
                'phone'         => $phone,
                'message'       => nl2br($message)
            ];
            DB::table('contacts')->insertGetId($contact);
            $request->session()->flash('alert-success', 'Thông tin đã được gửi, chúng tôi sẽ liên hệ sớm');
            return redirect(route('front.contact'));
        }
    }
    public function getNenkin(){
        $page = DB::table('pages')->where('id', 1)->first();
        return view('index.nenkin', ['data' => $page]);
    }
    public function postNenkin(Request $request)
    {
        $rules = [
            'email'             => 'required|email',
            'phone'             => 'required|numeric|phone',
            'name'              => 'required',
            'message'           => 'required'
        ];
        $message = [
            'email.required'    => "Vui lòng nhập email",
            'email.email'       => "Email không đúng định dạng",
            'phone.required'    => "Nhập số điện thoại của bạn",
            'phone.numeric'     => "Số điện thoại không đúng",
            'name.required'     => "Vui lòng nhập tên",
            'message.required'  => "Vui lòng nhập nội dung liên hệ"
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $name           = $request->post('name');
            $email          = $request->post('email');
            $phone          = $request->post('phone');
            $message        = $request->post('message', '');
            $nenkin = [
                'name'          => $name,
                'email'         => $email,
                'phone'         => $phone,
                'message'       => nl2br($message)
            ];
            DB::table('nenkin')->insertGetId($nenkin);
            $request->session()->flash('alert-success', 'Thông tin đã được gửi, chúng tôi sẽ liên hệ sớm');
            return redirect(route('front.nenkin'));
        }
    }
}