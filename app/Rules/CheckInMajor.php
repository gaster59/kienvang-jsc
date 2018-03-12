<?php

namespace App\Rules;

use App\Repositories\MajorRepository;
use Illuminate\Contracts\Validation\Rule;

class CheckInMajor implements Rule
{
    /**
     * @var MajorRepository $major;
     */
    var $majors;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($majors)
    {
        $this->majors = $majors;
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
        $majors = $this->majors;
        $isPass = false;
        foreach ($majors as $major) {
            if ($major->id == $value) {
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
        return 'Ngành nghề bạn chọn không tồn tại.';
    }
}
