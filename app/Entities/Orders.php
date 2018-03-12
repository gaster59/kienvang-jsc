<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Orders extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'info_customer',
        'code',
        'total',
        'ship_address',
        'status',
        'user_id',
        'info'
    ];

}
