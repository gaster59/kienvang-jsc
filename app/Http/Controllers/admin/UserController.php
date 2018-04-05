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
        $academiccareer = array(
            "1"   => "Sau đại học",
            "2"   => "Cử nhân",
            "3"   => "Cao đẳng",
            "4"   => "Trung học chuyên nghiệp",
            "5"   => "Phổ thông trung học"
        );
        return \view('admin.user.view',[
            'user' => $user,
            "academiccareer"=> $academiccareer,
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