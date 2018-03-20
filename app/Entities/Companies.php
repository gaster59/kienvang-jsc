<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Companies extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'scale',
        'summary',
        'founding',
        'meta_keyword',
        'meta_description',
        'avatar',
        'is_home',
        'website',
        'status'
    ];
}
