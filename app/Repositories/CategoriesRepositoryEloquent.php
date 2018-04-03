<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Categories;

/**
 * Class CategoriesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoriesRepositoryEloquent extends BaseRepository implements CategoriesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categories::class;
    }

    /**
     * @inheritdoc
     */
    public function getCategory($status = 1)
    {
        $res = $this->scopeQuery(function($query) {
                    return $query->where('status', 1);
                })->all();
        return $res;
    }
    public function getCategorySlug($where)
    {
        $res = $this->scopeQuery(function($query) use($where) {
                    return $query->where($where);
                })->first();
        return $res;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
