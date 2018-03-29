<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository;
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


    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
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
                $fileName = str_slug($name, '_')."_".date("Y-m-d").'.'.$cv->getClientOriginalExtension();
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
}