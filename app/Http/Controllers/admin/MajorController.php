<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MajorRequest;
use App\Repositories\MajorRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Admin
 */
class MajorController extends BaseController
{
    /**
     * @var MajorRepository $majorRepository
     */
    var $majorRepository;

    public function __construct(MajorRepository $majorRepository)
    {
        parent::__construct();
        $this->majorRepository = $majorRepository;
    }

    /**
     * Index action - Get major category
     *
     * @param Request | $request
     *
     * @return View
     */
    public function index(Request $request)
    {
        $majors = $this->majorRepository->getMajor();
        return \view('admin.major.index',[
            'majors' => $majors
        ]);
    }

    /**
     * Add major
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        return \view('admin.major.add', []);
    }

    /**
     * Edit major
     *
     * @param Request | $request
     * @param int | $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $major = $this->majorRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($major) == 0) {
            return redirect(route('major'));
        }

        $major = $major[0];
        return \view('admin.major.edit', [
            'major' => $major
        ]);
    }

    /**
     * Handle process data Category
     *
     * @param MajorRequest $request
     */
    public function store(MajorRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            $attributes = [
                'name' => $request->post('name'),
                'status' => 1
            ];
            $this->majorRepository->create($attributes);
            return redirect(route('major'));
        }
        if ($method == 'edit') {
            $id = $request->id;

            $major = $this->majorRepository->findWhere([
                'id' => $id,
                'status' => 1
            ]);

            if (count($major) == 0) {
                return redirect(route('major'));
            }

            $attributes = [
                'name' => $request->post('name'),
                'status' => 1
            ];
            $this->majorRepository->update($attributes, $id);
            return redirect(route('major'));
        }
    }

    public function delete($id)
    {
        $major = $this->majorRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($major) == 0) {
            return redirect(route('major'));
        }

        $major = $major[0];
        $attributes = [
            'name' => $major->name,
            'status' => 0
        ];
        $this->majorRepository->update($attributes, $id);
        return redirect(route('major'));
    }
}