<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Recruitments extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'recruitments';

    protected $fillable = [
        'name',
        'description',
        'summary',
        'meta_keyword',
        'meta_description',
        'avatar',
        'company_id'
    ];

}
