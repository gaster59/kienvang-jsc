<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository;
use App\Repositories\NewsRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{

    /**
     * @var JobRepository $jobRepository
     */
    var $jobRepository;
    var $newsRepository;
    var $categoryRepository;

    public function __construct(JobRepository $jobRepository, NewsRepository $newsRepository, CategoriesRepository $categoryRepository)
    {
        $this->jobRepository = $jobRepository;
        $this->newsRepository= $newsRepository;
        $this->categoryRepository= $categoryRepository;
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
        return view('jobs.detail', [
            'dataJob'  => $dataJob[0],
            'jobsList'  => $jobsList
        ]);
    }
    public function apply($id, $slug=null)
    {
        if (!is_numeric($id)) {
            return redirect(route('front.jobs.detail', ['id'=>$id, 'slug'=> $slug]));
        }
        $dataJob = $this->jobRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);
        if (count($dataJob) == 0) {
            return redirect(route('front.jobs.detail', ['id'=>$id, 'slug'=> $slug]));
        }


        $ar = [['jobs.status', '=', '1'],['jobs.id', '<>', $id], ['jobs.major_id', '=', $dataJob[0]->major_id]];
        $jobsList = $this->jobRepository->getNewsCustomize( $ar  , 10);
        return view('jobs.apply', [
            'dataJob'  => $dataJob[0],
            'jobsList'  => $jobsList
        ]);
    }
    public function checkApply(Request $request){
        $user = Auth::user();
        $user_id = $user['id'];
        $name = $user['name'];

        $rules = [
            'cv'                => 'bail|required|max:10240'
        ];
        $message = [
            'cv.required'      => 'Vui lòng chọn CV',
            //'cv.mimes'          => 'Định dạng CV không chính xác(.doc, docx)',
            //'cv.mimetypes'      => 'Định dạng CV không chính xác(.doc, docx)',
            'cv.max'           => 'CV của bạn vượt quá dung lượng cho phép'
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $job_id           = $request->post('job_id');
            $note             = $request->post('note', '');
            $namejob          = $request->post('namejob');
            $cv               = $request->file('cv');
            $destination      = public_path('/cvapply');

            $fileName = '';
            if (!is_null($cv)) {
                $fileName = str_slug($name, '_')."_".str_slug($namejob, '_')."_".date("Y-m-d").'.'.$cv->getClientOriginalExtension();
            }
            $info = array(
                'job_id'          => $job_id,
                'user_id'         => $user_id,
                'text'            => nl2br($note),
                'cv'              => $fileName
            );

            DB::table('applies')->insertGetId($info);
            if(!empty($fileName)){
                $cv->move($destination, $fileName);
            }
            $request->session()->flash('alert-success', 'Thông tin đã được gửi, chúng tôi sẽ liên hệ sớm');
            return redirect(route('front.jobs.apply', ['id'=>$job_id, 'slug'=> str_slug($namejob)]));
        }

    }
    public function getSearch(Request $request){
        $val = $request->name;
        $ar = [['jobs.status', '=', '1'], ['jobs.name', 'like', '%' .$val . '%'] ];
        $jobsList = $this->jobRepository->getNewsCustomize( $ar  , 3);
        $arnews = [['type', '=', '1'],['status', '=', '1'], ['name', 'like', '%' .$val . '%']];
        $news = $this->newsRepository->getNewsCustomize($arnews, 3);
        $html = '';

        if(!empty($jobsList[0]->id)){
        $html.='<div>
                <div class="sb__suggestions-group">
                <header class="sb__suggestions-group__name">Tin tuyển dụng</header>
                <ul class="sb__suggestions-list">
                ';
            foreach ($jobsList as $key => $value) {
                $url = url(route('front.jobs.detail', ['id'=>$value->id, 'slug'=> $value->slug] ));
                $html.= '
                  <li class="sb__suggestions-item"><a href="'.$url.'" class="link d-block"><div><h6 class="font-weight-bold mb-0 suggestion-identifier"><div>'.$value->name.'</div></h6><div><span class="has-primary-color">'.$value->major_name.'</span><span class="has-gray-color"> posted on '.$value->created_at.'</span></div><div class="has-inverse-color"><div>'.str_limit($value->description, 90, '...').'</div></div></div></a></li>
                ';
            }

        $html.='</ul></div>
                </div>';
        }

        if(!empty($news[0]->id)){
        $html.='<div>
                <div class="sb__suggestions-group">
                <header class="sb__suggestions-group__name">Tin tức</header>
                <ul class="sb__suggestions-list">
                ';
            foreach ($news as $key => $value) {
                $url = url(route('front.news.detail', ['id'=>$value->id, 'slug'=> $value->slug] ));
                $html.= '
                  <li class="sb__suggestions-item"><a href="'.$url.'" class="link d-block"><div><h6 class="font-weight-bold mb-0 suggestion-identifier"><div>'.$value->name.'</div></h6><div><span class="has-gray-color"> posted on '.$value->updated_at.'</span></div><div class="has-inverse-color"><div>'.str_limit($value->description, 90, '...').'</div></div></div></a></li>
                ';
            }

        $html.='</ul></div>
                </div>';
        }

        return response()->json([
            'error' => false,
            'html'=> $html
        ], 200);
    }
    public function getPageSearch(Request $request){
        $q      = $request->get('q');
        $tab    = $request->get('tab');
        $jobsList = [];
        $news     = [];
        if(!empty($q)):
            $ar = [['jobs.status', '=', '1'], ['jobs.name', 'like', '%' .$q . '%'] ];
            $jobsList = $this->jobRepository->getNewsCustomize( $ar  , 20);
            $arnews = [['type', '=', '1'],['status', '=', '1'], ['name', 'like', '%' .$q . '%']];
            $news = $this->newsRepository->getNewsCustomize($arnews, 20);
        endif;
        return view('index.search', [
            'tab'       => $tab,
            'jobs'      => $jobsList,
            'news'      => $news,
            'keysearch' => $q
        ]);
    }
    public function postPageSearch(Request $request){
        $keysearch = $request->name;
        $ar = [['jobs.status', '=', '1'], ['jobs.name', 'like', '%' .$keysearch . '%'] ];
        $jobs = $this->jobRepository->getNewsCustomize( $ar  , 20);
        $arnews = [['type', '=', '1'],['status', '=', '1'], ['name', 'like', '%' .$keysearch . '%']];
        $news = $this->newsRepository->getNewsCustomize($arnews, 20);

        $view = view("index._itemlist",compact('jobs', 'news', 'keysearch'))->render();
        return response()->json([
            'error' => false,
            'html'=> $view
        ], 200);
    }
    public function getCategory($slug){
        $data = $this->categoryRepository->getCategorySlug([['slug' ,'like', $slug]]);
        $ar = [['jobs.status', '=', '1'], ['jobs.category_id', '=', $data->id] ];
        $jobs = $this->jobRepository->getNewsCustomize( $ar  , 20);
        return view('jobs.category', [
            'data'             => $data,
            'jobs'             => $jobs
        ]);
    }
}