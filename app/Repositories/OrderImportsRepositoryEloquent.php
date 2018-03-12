<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Order_ImportsRepository;
use App\Entities\OrderImports;
use App\Validators\OrderImportsValidator;

/**
 * Class OrderImportsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderImportsRepositoryEloquent extends BaseRepository implements OrderImportsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderImports::class;
    }

    /**
     * @inheritdoc
     */
    public function getOrderImports($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->join('users', function ($join) {
                    $join->on('order_imports.user_id', '=', 'users.id')
                        ->where('users.status','=', '1');
                })
                ->where('order_imports.status', $status)
                ->orderBy('id', 'desc');
        })->paginate(env('PAGINATION',20), [
            'order_imports.id',
            'users.name',
            'order_imports.total',
            'order_imports.created_at',
            'order_imports.info'
        ]);
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
