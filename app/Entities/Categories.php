<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Categories extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    protected $fillable = [
        'name',
        'parent_id',
        'status'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
