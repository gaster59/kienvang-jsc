<?php

namespace App\Http\Requests;

use App\Repositories\CategoriesRepository;
use App\Rules\CheckInCategory;
use App\Rules\CheckInUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ExpenseRequest extends FormRequest
{
    /**
     * @var CategoriesRepository $categoriesRepository
     */
    var $categoriesRepository;


    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
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
        $categories = $this->categoriesRepository->getCategory();
        $users = DB::table('users')->where('status',1)->get();
        return [
            'id',
            'name' => 'required|max:50',
            'description' => 'max:255',
            'avatar' => 'image',
            'price' => 'required|numeric',
            'category_id' => [
                'required',
                new CheckInCategory($categories)
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
            'name.required' => 'Bạn chưa nhập tên chi tiêu',
            'name.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'description.max' => 'Bạn chỉ nhập tối đa :max ký tự',

            'avatar.image' => 'Bạn chỉ được upload hình ảnh',

            'price.required' => 'Bạn chưa nhập giá',
            'price.numeric' => 'Bạn chỉ nhập số cho giá',
        ];
    }

}
