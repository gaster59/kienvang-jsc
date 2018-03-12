<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Imports extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'qty',
        'order_import_id',
    ];

}
