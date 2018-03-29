<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;

class UserController extends BaseController
{

    var $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $where = [['status', '=', 2]];
        $filed = ['id', 'name', 'email', 'phone','address'];
        $users = $this->userRepository->getAllUser($where, 20, $filed);
        return \view('admin.user.index',[
            'users' => $users,
            'title' => 'Danh sách user'
        ]);
    }

    public function view($id)
    {
        $user = $this->userRepository->getUser($id);
        $info = json_decode($user->info);
        unset($user['info']);
        $user['info'] = $info;
        return \view('admin.user.view',[
            'user' => $user,
            'title' => 'Thông tin user'
        ]);
    }
    public function delete($id)
    {
        // $contact = DB::table('contacts')->where('id', $id)->first();
        // if(empty($contact)){
        //     return redirect(route('contact'));
        // }
        // DB::table('contacts')
        //     ->where('id', $id)
        //     ->delete();
        // return redirect(route('contact'));
    }

}