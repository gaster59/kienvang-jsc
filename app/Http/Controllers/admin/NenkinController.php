<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class NenkinController extends BaseController
{
    /**
     * @var ContactRepository $contactRepository
     */

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $nenkin = DB::table('nenkin')->orderByRaw('id DESC')->simplePaginate(20);
        return \view('admin.nenkin.index',[
            'nenkin' => $nenkin,
            'title' => 'Danh sách nenkin'
        ]);
    }

    public function updatestatus($id)
    {
        $nenkin = DB::table('nenkin')->where('id', $id)->first();
        if(empty($nenkin)){
            return redirect(route('nenkin'));
        }
        DB::table('nenkin')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect(route('nenkin'));
    }
    public function delete($id)
    {
        $nenkin = DB::table('nenkin')->where('id', $id)->first();
        if(empty($nenkin)){
            return redirect(route('nenkin'));
        }
        DB::table('nenkin')
            ->where('id', $id)
            ->delete();
        return redirect(route('nenkin'));
    }

}