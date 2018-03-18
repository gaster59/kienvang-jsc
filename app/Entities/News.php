<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model implements Transformable
{
    use TransformableTrait;

    use Sluggable;

    protected $table = 'news';

    protected $fillable = [
        'name',
        'description',
        'summary',
        'avatar',
        'type',
        'is_hot',
        'status',
        'meta_keyword',
        'meta_description'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
