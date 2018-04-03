<?php

namespace App\Rules;

use App\Repositories\CategoriesRepository;
use Illuminate\Contracts\Validation\Rule;

class CheckInCategory implements Rule
{

    /**
     * @var CategoriesRepository $categoriesRepository
     */
    var $categories;

    /**
     * Create a new rule instance.
     *
     * @param CategoriesRepository $categoriesRepository
     *
     * @return void
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $categories = $this->categories;
        $isPass = false;
        foreach ($categories as $category) {
            if ($category->id == $value) {
                $isPass = true;
                break;
            }
        }
        return $isPass;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Danh mục không tồn tại.';
    }
}
