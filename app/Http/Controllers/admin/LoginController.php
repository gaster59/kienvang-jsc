<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\User;

/**
 * Class BaseController
 *
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Login view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $status = $user['status'];
            if ($status == 1) {
                return redirect(route('category'));
            }
        }
        return view('admin.login.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    /**
     * Handle user login in admin
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkLogin(Request $request)
    {
        $email = $request->post('email', '');
        $password = $request->post('password', '');
        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
            'status' => 1], true)) {
            return redirect(route('category'));
        } else {
            return redirect()->back()->with('fail', 'Đăng nhập thất bại');
        }
    }

    /**
     * Hanlde register user
     *
     * @return void
     */
    public function registerUser()
    {
        \App\User::create([
            'name' => 'tuan anh',
            'email' => 'trantuananh198610@gmail.com',
            'password' => bcrypt('admin'),
            'address' => 'day la address',
            'phone' => '123123333',
            'status' => 1
        ]);

    }

}
