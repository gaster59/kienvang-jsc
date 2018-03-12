<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class News extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'news';

    protected $fillable = [
        'name',
        'description',
        'summary',
        'avatar',
        'type',
        'status',
        'meta_keyword',
        'meta_description'
    ];

}
