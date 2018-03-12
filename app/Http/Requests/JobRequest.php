<?php

namespace App\Http\Requests;

use App\Repositories\CompaniesRepository;
use App\Repositories\MajorRepository;
use App\Rules\CheckInCategory;
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

    public function __construct(MajorRepository $majorRepository, CompaniesRepository $companiesRepository)
    {
        $this->majorRepository = $majorRepository;
        $this->companiesRepository = $companiesRepository;
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
        return [
            'id',
            'name' => 'required|max:50',
            'description' => 'max:255',
            'summary',
            'major_id' => [
                'required',
                new CheckInMajor($majors)
            ],
            'company_id' => [
                'required',
                new CheckInCategory($companies)
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

            'description.max' => 'Bạn chỉ nhập tối đa :max ký tự',
        ];
    }
}
