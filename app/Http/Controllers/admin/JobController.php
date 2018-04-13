<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\JobRequest;
use App\Repositories\CompaniesRepository;
use App\Repositories\JobRepository;
use App\Repositories\MajorRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Admin
 */
class JobController extends BaseController
{
    /**
     * @var JobRepository $jobRepository
     */
    var $jobRepository;

    /**
     * @var MajorRepository $majorRepository
     */
    var $majorRepository;

    /**
     * @var CompaniesRepository $companiesRepository
     */
    var $companiesRepository;

    /**
     * @var CategoriesRepository $companiesRepository
     */
    var $categoryRepository;

    public function __construct(JobRepository $jobRepository,
        MajorRepository $majorRepository,
        CompaniesRepository $companiesRepository, CategoriesRepository $categoryRepository)
    {
        parent::__construct();
        $this->jobRepository = $jobRepository;
        $this->majorRepository = $majorRepository;
        $this->companiesRepository = $companiesRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Index action - Get list j
     *
     * @param Request $request
     *
     * @return View
     */
    public function index(Request $request)
    {
        $jobs = $this->jobRepository->getJob();
        return \view('admin.job.index',[
            'jobs' => $jobs,
            'title' => 'Danh sách việc làm'
        ]);
    }

    /**
     * Add job
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        $majors = $this->majorRepository->getMajor();
        $companies = $this->companiesRepository->getAllCompany();
        $category = $this->categoryRepository->getCategory();
        return \view('admin.job.add', [
            'majors' => $majors,
            'companies' => $companies,
            'category' => $category,
            'title' => 'Thêm việc làm'
        ]);
    }

    /**
     * Edit job
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $job = $this->jobRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($job) == 0) {
            return redirect(route('job'));
        }

        $job = $job[0];
        $majors = $this->majorRepository->getMajor();
        $arr = [['companies.status', '=', '1']];
        $companies = $this->companiesRepository->getAllCompany();
        $category = $this->categoryRepository->getCategory();
        return \view('admin.job.edit', [
            'job' => $job,
            'majors' => $majors,
            'companies' => $companies,
            'category' => $category,
            'title' => 'Cập nhật việc làm'
        ]);
    }

    /**
     * Handle process data Job
     *
     * @param JobRequest $request
     *
     * @return void
     */
    public function store(JobRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            // Handle add job
            $this->handleAddJob($request);
            return redirect(route('job'));
        }
        if ($method == 'edit') {
            // Handle edit job
            $id = $request->id;
            $job = $this->jobRepository->findWhere([
                'id' => $id,
                'status' => 1
            ]);
            if (count($job) == 0) {
                return redirect(route('job'));
            }
            $job[0]->slug = '';
            $this->handleEditJob($request, $job);
            return redirect(route('job'));
        }
    }

    /**
     * Handle add job
     *
     * @param Request $request
     *
     * @return void
     */
    private function handleAddJob($request)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $summary = $request->post('summary', '');
        $majorId = $request->post('major_id', '');
        $companyId = $request->post('company_id', '');
        $categoryId = $request->post('category_id', '');
        $metaKeyword = $request->post('meta_keyword', '');
        $metaDescription = $request->post('meta_description', '');
        $status = 1;

        $job = [
            'name' => $name,
            'description' => $description,
            'summary' => $summary,
            'major_id' => $majorId,
            'company_id' => $companyId,
            'category_id'=> $categoryId,
            'meta_keyword' => $metaKeyword,
            'meta_description' => $metaDescription,
            'status' => $status
        ];
        $this->jobRepository->create($job);
    }

    /**
     * Handle edit job
     *
     * @param Request $request
     * @param $job
     *
     * @return void
     */
    private function handleEditJob($request, $product)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $summary = $request->post('summary', '');
        $majorId = $request->post('major_id', '');
        $companyId = $request->post('company_id', '');
        $categoryId = $request->post('category_id', '');
        $metaKeyword = $request->post('meta_keyword', '');
        $metaDescription = $request->post('meta_description', '');
        $status = 1;

        $product = [
            'name' => $name,
            'description' => $description,
            'summary' => $summary,
            'major_id' => $majorId,
            'company_id' => $companyId,
            'category_id'=> $categoryId,
            'meta_keyword' => $metaKeyword,
            'meta_description' => $metaDescription,
            'status' => $status
        ];
        $this->jobRepository->update($product, $request->id);
    }
    public function delete($id)
    {
        $job = $this->jobRepository->findWhere([
            'id' => $id,
        ]);

        if (count($job) == 0) {
            return redirect(route('job'));
        }
        $this->jobRepository->delete($id);
        return redirect(route('job'));
    }
}