<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends BaseController
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
        $contacts = DB::table('contacts')->orderByRaw('id DESC')->simplePaginate(20);
        return \view('admin.contact.index',[
            'contacts' => $contacts,
            'title' => 'Danh sách contact'
        ]);
    }

    public function updatestatus($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();
        if(empty($contact)){
            return redirect(route('contact'));
        }
        DB::table('contacts')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect(route('contact'));
    }
    public function delete($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();
        if(empty($contact)){
            return redirect(route('contact'));
        }
        DB::table('contacts')
            ->where('id', $id)
            ->delete();
        return redirect(route('contact'));
    }

}