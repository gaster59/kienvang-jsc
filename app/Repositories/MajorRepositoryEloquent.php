<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MajorRepository;
use App\Entities\Major;
use App\Validators\MajorValidator;

/**
 * Class MajorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MajorRepositoryEloquent extends BaseRepository implements MajorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Major::class;
    }

    /**
     * @inheritdoc
     */
    public function getMajor($status = 1)
    {
        $res = $this->scopeQuery(function($query) {
            return $query->where('status', 1)
                         ->orderBy('updated_at', 'desc');
        })->all();
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
