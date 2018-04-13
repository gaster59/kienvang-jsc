<?php

namespace App\Http\Requests;

use App\Repositories\CompaniesRepository;
use App\Repositories\MajorRepository;
use App\Repositories\CategoriesRepository;
use App\Rules\CheckInCategory;
use App\Rules\CheckInCompany;
use App\Rules\CheckInMajor;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{

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


    public function __construct(MajorRepository $majorRepository, CompaniesRepository $companiesRepository, CategoriesRepository $categoryRepository)
    {
        $this->majorRepository = $majorRepository;
        $this->companiesRepository = $companiesRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $majors = $this->majorRepository->getMajor();
        $companies = $this->companiesRepository->getAllCompany();
        $category = $this->categoryRepository->getCategory();
        return [
            'id',
            'name' => 'required|max:50',
            'description' => 'max:255',
            'meta_keyword'=> 'required',
            'meta_description'=>'required',
            'summary',
            'major_id' => [
                'required',
                new CheckInMajor($majors)
            ],
            'company_id' => [
                'required',
                new CheckInCompany($companies)
            ],
            'category_id' => [
                'required',
                new CheckInCategory($category)
            ],
            'method'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.max' => 'Bạn chỉ nhập tối đa :max ký tự',
            'meta_keyword.required'=>'Bạn chưa nhập meta keyword',
            'meta_description.required'=>'Bạn chưa nhập meta description',

            'description.max' => 'Bạn chỉ nhập tối đa :max ký tự',
        ];
    }
}
