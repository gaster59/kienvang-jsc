<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends BaseController
{
    var $newsRepository;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index action - show list news
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = DB::table('pages')->orderByRaw('id DESC')->simplePaginate(20);
        return \view('admin.pages.index',[
            'pages' => $pages,
            'title' => 'Danh sách'
        ]);
    }

    public function edit($id)
    {
        $page = DB::table('pages')->where('id', $id)->first();

        if (count($page) == 0) {
            return redirect(route('pages'));
        }

        return \view('admin.pages.edit', [
            'page' => $page,
            'title' => 'Cập nhật'
        ]);
    }

    public function store(Request $request)
    {
        $method = $request->post('method');
        if ($method == 'edit') {
            // Handle edit product
            $id = $request->id;
            $page = DB::table('pages')->where('id', $id)->first();

            if (count($page) == 0) {
                return redirect(route('pages'));
            }

            $this->handleEditPages($request, $page);
            return redirect(route('pages'));
        }
    }

    /**
     * Handle edit product
     *
     * @param Request $request
     * @param $company
     *
     * @return void
     */
    private function handleEditPages($request, $page)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $status = 1;

        $page = [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ];
        DB::table('pages')
            ->where('id',  $request->id)
            ->update($page);
        return redirect(route('pages'));
    }

    public function delete($id)
    {
        $news = $this->newsRepository->findWhere([
            'id' => $id,
            'type' => 1,
            'status' => 1
        ]);

        if (count($news) == 0) {
            return redirect(route('news'));
        }

        $news = $news[0];
        $attributes = [
            'status' => 0
        ];
        $this->newsRepository->update($attributes, $id);
        return redirect(route('news'));
    }
}