<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Repositories\NewsRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    var $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        parent::__construct();
        $this->newsRepository = $newsRepository;
    }

    /**
     * Index action - show list news
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keysearch      = $request->get('keysearch');
        $news = $this->newsRepository->getNews();
        if(!empty($keysearch)){
            $arnews = [['type', '=', '1'],['status', '=', '1'], ['name', 'like', '%' .$keysearch . '%']];
            $news = $this->newsRepository->getNewsCustomize($arnews, 2);
        }
        return \view('admin.news.index',[
            'news' => $news,
            'title' => 'Danh sách tin tức',
            'keysearch' => $keysearch
        ]);
    }

    /**
     * Add action - show view add news
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        return \view('admin.news.add', [
            'title' => 'Thêm tin tức'
        ]);
    }

    /**
     * Edit action - show view edit company
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
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
        return \view('admin.news.edit', [
            'news' => $news,
            'title' => 'Cập nhật tin tức'
        ]);
    }

    public function store(NewsRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            // Handle add product
            $this->handleAddNews($request);
            return redirect(route('news'));
        }
        if ($method == 'edit') {
            // Handle edit product
            $id = $request->id;
            $news = $this->newsRepository->findWhere([
                'id' => $id,
                'type' => 1,
                'status' => 1
            ]);
            if (count($news) == 0) {
                return redirect(route('news'));
            }
            $news[0]->slug = '';
            $this->handleEditNews($request, $news);
            return redirect(route('news'));
        }
    }

    /**
     * Handle add product
     *
     * @param Request $request
     *
     * @return void
     */
    private function handleAddNews($request)
    {

        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $summary = $request->post('summary', '');
        $metaKeyword = $request->post('meta_keyword', '');
        $metaDescription = $request->post('meta_description', '');
        $isHot = $request->post('is_hot', 0);
        $status = 1;
        $type = 1;

        $news = [
            'name' => $name,
            'description' => $description,
            'summary' => $summary,
            'type' => $type,
            'is_hot' => $isHot,
            'status' => $status,
            'meta_keyword' => $metaKeyword,
            'meta_description' => $metaDescription,
        ];
        $this->newsRepository->create($news);
    }

    /**
     * Handle edit product
     *
     * @param Request $request
     * @param $company
     *
     * @return void
     */
    private function handleEditNews($request, $news)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $summary = $request->post('summary', '');
        $metaKeyword = $request->post('meta_keyword', '');
        $metaDescription = $request->post('meta_description', '');
        $isHot = $request->post('is_hot', 0);
        $status = 1;
        $type = 1;

        $news = [
            'name' => $name,
            'description' => $description,
            'summary' => $summary,
            'status' => $status,
            'type' => $type,
            'is_hot' => $isHot,
            'meta_keyword' => $metaKeyword,
            'meta_description' => $metaDescription,
        ];
        $this->newsRepository->update($news, $request->id);
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
    public function postSearch(Request $request){
        $keysearch = $request->keysearch;
        $arnews = [['type', '=', '1'],['status', '=', '1'], ['name', 'like', '%' .$keysearch . '%']];
        $news = $this->newsRepository->getNewsCustomize($arnews, 2);

        $view = view("admin.news._itemlist",compact('news', 'keysearch'))->render();
        return response()->json([
            'error' => false,
            'html'=> $view
        ], 200);
    }
}