<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ApplyRepository;
use App\Entities\Apply;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ApplyRepositoryEloquent extends BaseRepository implements ApplyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Apply::class;
    }

    public function getApply($where, $field= null)
    {
        $res = $this->scopeQuery(function($query) use($where) {
        return $query
            ->join('users', function ($join) {
                $join->on('applies.user_id', '=', 'users.id')
                    ->where('users.status','=', '2');
            })
            ->join('jobs', function ($join) {
                $join->on('applies.job_id', '=', 'jobs.id')
                    ->where('jobs.status','=', '1');
            })
            ->where($where);
        })->first($field);
        return $res;
    }
    public function getAllApply($where ,$limit = 20, $field= null)
    {
        $res = $this->scopeQuery(function($query) use($where) {
        return $query
            ->join('users', function ($join) {
                $join->on('applies.user_id', '=', 'users.id')
                    ->where('users.status','=', '2');
            })
            ->join('jobs', function ($join) {
                $join->on('applies.job_id', '=', 'jobs.id')
                    ->where('jobs.status','=', '1');
            })
            ->orderBy('applies.id','desc')
            ->where($where);
        })->paginate($limit, $field);
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
