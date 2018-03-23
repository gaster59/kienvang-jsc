<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Job extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    protected $fillable = [
        'name',
        'description',
        'summary',
        'major_id',
        'company_id',
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
