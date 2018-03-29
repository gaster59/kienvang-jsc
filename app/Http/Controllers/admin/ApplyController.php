<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;
use App\Repositories\ApplyRepository;

class ApplyController extends BaseController
{

    var $applyRepository;

    public function __construct(ApplyRepository $applyRepository)
    {
        parent::__construct();
        $this->applyRepository = $applyRepository;
    }
    public function index()
    {
        $where = [['applies.status', '=', 1]];
        $filed = ['applies.id', 'users.name as username', 'jobs.name as jobname', 'applies.cv','applies.text', 'applies.created_at'];
        $applies = $this->applyRepository->getAllApply($where, 20, $filed);
        return \view('admin.applyjob.index',[
            'applies' => $applies,
            'title' => 'Danh sách apply công việc'
        ]);
    }

    public function view($id)
    {
        $where = [['applies.id', '=', $id]];
        $filed = ['applies.id as applyid','users.id as userid' ,'users.name as username','jobs.id as jobid' ,'jobs.name as jobname', 'applies.cv','applies.text', 'applies.created_at'];
        $apply = $this->applyRepository->getApply($where, $filed);
        return \view('admin.applyjob.view',[
            'apply' => $apply,
            'title' => 'Thông tin ứng tuyển'
        ]);
    }
    public function delete($id)
    {
        // $user = $this->applyRepository->getUser($id);
        // if (count($user) == 0) {
        //     return redirect(route('user'));
        // }

        // $destination = public_path('/cv');
        // $fileName = $user->curriculum_vitae;
        // $fileSystem = new Filesystem();
        // if ($fileSystem->exists($destination.'/'.$fileName)) {
        //     $fileSystem->delete($destination.'/'.$fileName);
        // }
        // $this->applyRepository->delete($id);
        return redirect(route('applyjob'));
    }

}