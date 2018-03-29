<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;
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
        $user = $this->userRepository->getUser($id);
        if (count($user) == 0) {
            return redirect(route('user'));
        }

        $destination = public_path('/cv');
        $fileName = $user->curriculum_vitae;
        $fileSystem = new Filesystem();
        if ($fileSystem->exists($destination.'/'.$fileName)) {
            $fileSystem->delete($destination.'/'.$fileName);
        }
        $this->userRepository->delete($id);
        return redirect(route('user'));
    }

}