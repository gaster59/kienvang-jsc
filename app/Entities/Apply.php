<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Apply extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'user_id',
    	'job_id',
        'cv',
        'text',
        'status',
        'view'
    ];

}
