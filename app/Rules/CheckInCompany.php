<?php

namespace App\Rules;

use App\Entities\Companies;
use Illuminate\Contracts\Validation\Rule;

class CheckInCompany implements Rule
{
    /**
     * @var Companies $companies
     */
    var $companies;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($companies)
    {
        $this->companies = $companies;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $companies = $this->companies;
        $isPass = false;
        foreach ($companies as $company) {
            if ($company->id == $value) {
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
        return 'Công ty bạn chọn không tồn tại.';
    }
}
