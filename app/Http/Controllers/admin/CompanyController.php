<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CompanyRequest;
use App\Repositories\CompaniesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;

class CompanyController extends BaseController
{
    /**
     * @var CompaniesRepository $companyRepository
     */
    var $companyRepository;

    /**
     * CompanyController constructor.
     * @param CompaniesRepository $companiesRepository
     */
    public function __construct(CompaniesRepository $companiesRepository)
    {
        parent::__construct();
        $this->companyRepository = $companiesRepository;
    }

    /**
     * Index action - show list company
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $companies = $this->companyRepository->getCompany();
        return \view('admin.company.index',[
            'companies' => $companies,
            'title' => 'Danh sách công ty'
        ]);
    }

    /**
     * Add action - show view add company
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        return \view('admin.company.add', [
            'title' => 'Thêm công ty'
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
        $company = $this->companyRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($company) == 0) {
            return redirect(route('company'));
        }

        $company = $company[0];
        return \view('admin.company.edit', [
            'company' => $company,
            'title' => 'Cập nhật công ty'
        ]);
    }

    public function store(CompanyRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            // Handle add product
            $this->handleAddCompany($request);
            return redirect(route('company'));
        }
        if ($method == 'edit') {
            // Handle edit product
            $id = $request->id;
            $company = $this->companyRepository->findWhere([
                'id' => $id,
                'status' => 1
            ]);
            if (count($company) == 0) {
                return redirect(route('company'));
            }

            $this->handleEditCompany($request, $company);
            return redirect(route('company'));
        }
    }

    /**
     * Handle add product
     *
     * @param Request $request
     *
     * @return void
     */
    private function handleAddCompany($request)
    {
        $name = $request->post('name', '');
        $scale = $request->post('scale', '');
        $summary = $request->post('summary', '');
        $founding = $request->post('founding', '');
        $metaKeyword = $request->post('meta_keyword', '');
        $metaDescription = $request->post('meta_description', '');
        $status = 1;

        $avatar = $request->file('avatar');
        $destination = public_path('/company');

        $fileName = '';
        if (!is_null($avatar)) {
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $company = [
            'name' => $name,
            'scale' => $scale,
            'summary' => $summary,
            'avatar' => $fileName,
            'status' => $status,
            'founding' => $founding,
            'meta_keyword' => $metaKeyword,
            'meta_description' => $metaDescription,
        ];
        $this->companyRepository->create($company);
    }

    /**
     * Handle edit product
     *
     * @param Request $request
     * @param $company
     *
     * @return void
     */
    private function handleEditCompany($request, $company)
    {
        $name = $request->post('name', '');
        $scale = $request->post('scale', '');
        $summary = $request->post('summary', '');
        $founding = $request->post('founding', '');
        $metaKeyword = $request->post('meta_keyword', '');
        $metaDescription = $request->post('meta_description', '');
        $status = 1;

        $avatar = $request->file('avatar');
        $destination = public_path('/company');

        $fileName = $company[0]->avatar;
        if (!is_null($avatar)) {
            $fileSystem = new Filesystem();
            if ($fileSystem->exists($destination.'/'.$fileName)) {
                $fileSystem->delete($destination.'/'.$fileName);
            }
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $company = [
            'name' => $name,
            'scale' => $scale,
            'summary' => $summary,
            'avatar' => $fileName,
            'status' => $status,
            'founding' => $founding,
            'meta_keyword' => $metaKeyword,
            'meta_description' => $metaDescription,
        ];
        $this->companyRepository->update($company, $request->id);
    }
}