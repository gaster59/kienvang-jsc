<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoriesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends BaseController
{

    /**
     * @var CategoriesRepository | $categoryRepository
     */
    var $categoryRepository;

    /**
     * CategoryController constructor.
     *
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoriesRepository;
    }

    /**
     * Index action - Get list category
     *
     * @param Request | $request
     *
     * @return View
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->getCategory();
        return \view('admin.category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Add category
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        return \view('admin.category.add', []);
    }

    /**
     * Edit category
     *
     * @param Request | $request
     * @param int | $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $category = $this->categoryRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($category) == 0) {
            return redirect(route('category'));
        }

        $category = $category[0];
        return \view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Handle process data Category
     *
     * @param CategoryRequest $request
     */
    public function store(CategoryRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            $attributes = [
                'name' => $request->post('name'),
                'slug' => $request->post('name'),
                'parent_id' => 0,
                'status' => 1
            ];
            $this->categoryRepository->create($attributes);
            return redirect(route('category'));
        }
        if ($method == 'edit') {
            $id = $request->id;

            $category = $this->categoryRepository->findWhere([
                'id' => $id,
                'status' => 1
            ]);

            if (count($category) == 0) {
                return redirect(route('category'));
            }

            $attributes = [
                'name' => $request->post('name'),
                'slug' => $request->post('name'),
                'parent_id' => 0,
                'status' => 1
            ];
            $this->categoryRepository->update($attributes, $id);
            return redirect(route('category'));
        }
    }
}
