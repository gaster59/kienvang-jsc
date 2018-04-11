<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;

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
    public function useradmin()
    {
        $where = [['status', '=', 1]];
        $filed = ['id', 'name', 'email', 'phone','address'];
        $users = $this->userRepository->getAllUser($where, 20, $filed);
        return \view('admin.user.useradmin',[
            'users' => $users,
            'title' => 'Danh sách user admin'
        ]);
    }
    public function add()
    {
        return \view('admin.user.add',[
            'title' => 'Danh sách user admin'
        ]);
    }
    public function edit(Request $request, $id)
    {
        $user = $this->userRepository->getUser($id);

        if (count($user) == 0) {
            return redirect(route('useradmin'));
        }

        return \view('admin.user.edit', [
            'user' => $user,
            'title' => 'Cập nhật user admin'
        ]);
    }
    public function store(Request $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
        	$rules = [
	            'email'             => 'required|email|unique:users,email',
	            'name'              => 'required',
	            'password'     		=> 'required|min:8|confirmed',
                'password_confirmation'=> 'required',
	        ];
	        $message = [
	            'email.required'    => "Vui lòng nhập email",
	            'email.email'       => "Email không đúng định dạng",
	            'email.unique'      => 'Email này đã tồn tại',
	            'name.required'     => "Vui lòng nhập tên",
	            'password.required'  => 'Nhập mật khẩu của bạn',
	            'password.min'       => 'Mật khẩu không được nhỏ hơn :min ký tự',
	            'password_confirmation.required'  => 'Chưa xác nhận mật khẩu',
	            'password_confirmation.same'  => 'Mật khẩu xác nhận không chính xác',
	            'password.confirmed'	=> 'Hai mật khẩu không giống nhau'
	        ];

	        $validator = Validator::make($request->all(), $rules, $message);
	        if($validator->fails()){
	            return redirect()->back()->withErrors($validator->errors());
	        }else{
	        	$this->handleAdd($request);
	        }
            
            return redirect(route('useradmin'));
        }
        if ($method == 'edit') {
        	$id = $request->id;
        	$rules = [
	            'email'             => 'required|email|unique:users,email,'.$request->id,
	            'name'              => 'required'
	        ];
            $message = [
	            'email.required'    => "Vui lòng nhập email",
	            'email.email'       => "Email không đúng định dạng",
	            'email.unique'      => 'Email này đã tồn tại',
	            'name.required'     => "Vui lòng nhập tên",
	            'password.required'  => 'Nhập mật khẩu của bạn',
	            'password.min'       => 'Mật khẩu không được nhỏ hơn :min ký tự',
	            'password_confirmation.required'  => 'Chưa xác nhận mật khẩu',
	            'password_confirmation.same'  => 'Mật khẩu xác nhận không chính xác',
	            'password.confirmed'	=> 'Hai mật khẩu không giống nhau'
	        ];
            $user = $this->userRepository->getUser($id);
	        if (count($user) == 0) {
	            return redirect(route('useradmin'));
	        }
	        $password_old = $request->post('password_old', "");
	        if(!empty($password_old)){
	        	//dd(bcrypt($password_old),$user->password );
	        	if (!(Hash::check($password_old, $user->password ))) {
	        	//if( strcmp( bcrypt($password_old) ,$user->password) != 0 ){
	        		 return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
	        	}else{
	        		$rules['password'] = 'required|min:8|confirmed';
	        		$rules['password_confirmation']= 'required';
	        		$validator = Validator::make($request->all(), $rules, $message);
			        if($validator->fails()){
			            return redirect()->back()->withErrors($validator->errors());
			        }else{
			         	$this->handleEdit($request, $user);
			        }
	        	}
	        }else{
	        	$validator = Validator::make($request->all(), $rules, $message);
		        if($validator->fails()){
		            return redirect()->back()->withErrors($validator->errors());
		        }else{
		         	$this->handleEdit($request, $user);
		         }
	        }
        	
            return redirect(route('useradmin'));
        }
    }
    private function handleAdd($request)
    {
        $name = $request->post('name', '');
        $email = $request->post('email', '');
        $password = $request->post('password');

        \App\User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'address' => 'day la address',
            'phone' => '123123333',
            'status' => 1
        ]);
    }
    private function handleEdit($request)
    {
        $name = $request->post('name', '');
        $email = $request->post('email', '');
        $password = $request->post('password');

        $user = [
            'name' => $name,
            'email'  => $email,
            'password' => bcrypt($password),
        ];
        $this->userRepository->update($user, $request->id);
       
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
    public function deleteadmin($id)
    {
        $user = $this->userRepository->getUser($id);
        if (count($user) == 0) {
            return redirect(route('user'));
        }
        $this->userRepository->delete($id);
        return redirect(route('useradmin'));
    }

}