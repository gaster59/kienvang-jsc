<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
    public function getUser($id)
    {
        $res = $this->scopeQuery(function($query) use($id) {
                    return $query->where('id', $id);
                })->first();
        return $res;
    }
    public function getAllUser($where ,$limit = 20, $field= null)
    {
        $res = $this->scopeQuery(function($query) use ($where) {
        return $query
                ->where($where)
                ->orderBy('id','desc');
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
