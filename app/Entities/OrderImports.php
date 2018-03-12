<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderImports extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'order_imports';

    protected $fillable = [
        'total',
        'user_id',
        'status',
        'info',
    ];

}
