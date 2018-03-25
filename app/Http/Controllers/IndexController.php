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

    var $contactRepository;


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
        $slider = $this->bannerRepository->getBannerAboutNum(3, array('title', 'description', 'avatar'));

        //News
        $news = $this->newsRepository->getNews(1, 5);
        return view('index.index',[
            'slider'   => $slider,
            'jobs' => $jobs,
            'news'      => $news
        ]);
    }
    public function about(){
        return view('index.about');
    }
    public function getContact(){
        return view('index.contact');
    }
    public function postContact(Request $request)
    {
        $rules = [
            'email'             => 'required|email',
            'name'              => 'required',
            'message'           => 'required'
        ];
        $message = [
            'email.required'    => "Vui lòng nhập email",
            'email.email'       => "Email không đúng định dạng",
            'name.required'     => "Vui lòng nhập tên",
            'message.required'  => "Vui lòng nhập nội dung liên hệ"
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $name           = $request->post('name');
            $email          = $request->post('email');
            $message        = $request->post('message', '');
            $contact = [
                'name'          => $name,
                'email'         => $email,
                'message'       => $message
            ];
            DB::table('contacts')->insertGetId($contact);
            $request->session()->flash('alert-success', 'Thông tin đã được gửi, chúng tôi sẽ liên hệ sớm');
            return redirect(route('front.contact'));
        }
    }
}