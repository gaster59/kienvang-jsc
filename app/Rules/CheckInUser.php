<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class CheckInUser implements Rule
{
    /**
     * @var User $users;
     */
    var $users;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
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
        $users = $this->users;
        $isPass = false;
        foreach ($users as $user) {
            if ($user->id == $value) {
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
        return 'Người dùng này không tồn tại.';
    }
}
