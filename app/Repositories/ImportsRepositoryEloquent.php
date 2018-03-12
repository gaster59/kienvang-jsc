<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ImportsRepository;
use App\Entities\Imports;
use App\Validators\ImportsValidator;

/**
 * Class ImportsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ImportsRepositoryEloquent extends BaseRepository implements ImportsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Imports::class;
    }

    /**
     * @inheritdoc
     */
    public function getImports($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->join('order_imports', function ($join) {
                    $join->on('imports.order_import_id', '=', 'order_imports.id')
                        ->where('order_imports.status','=', '1');
                })
                ->orderBy('id', 'desc');
        })->paginate(env('PAGINATION',20), [
            'product_id',
            'product_name',
            'product_price',
            'qty',
        ]);
        return $res;
    }

    /**
     * @inheritdoc
     */
    public function getDetailImport($order_import_id, $status = 1)
    {
        $res = $this->scopeQuery(function($query) use($order_import_id, $status) {
            return $query
                ->where('order_import_id', $order_import_id)
                ->orderBy('id', 'desc');
        })->all([
            'product_id',
            'product_name',
            'product_price',
            'qty',
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
