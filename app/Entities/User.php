<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'name',
    	'email',
        'password',
        'address',
        'phone',
        'status',
        'birthday',
        'gender',
        'couple',
        'info',
        'curriculum_vitae',
        'remember_token',
        'created_at'
    ];

}
