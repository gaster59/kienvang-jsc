<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductRepository;
use App\Entities\Product;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * @inheritdoc
     */
    public function getProduct($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                        ->join('categories', function ($join) {
                            $join->on('products.category_id', '=', 'categories.id')
                                 ->where('categories.status','=', '1');
                        })
                        ->orderBy('id','desc')
                        ->where('products.status', $status);
        })->paginate(env('PAGINATION',20), [
            'products.id',
            'products.name',
            'products.avatar',
            'products.price',
            'categories.name as cat_name'
        ]);
        return $res;
    }

    public function getAllProduct($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->join('categories', function ($join) {
                    $join->on('products.category_id', '=', 'categories.id')
                        ->where('categories.status','=', '1');
                })
                ->orderBy('id','desc')
                ->where('products.status', $status);
        })->all([
            'products.id',
            'products.name',
            'products.avatar',
            'products.price',
            'categories.name as cat_name'
        ]);
        return $res;
    }

    public function getProductByIds($arrId, $status = 1)
    {
        $res = $this->scopeQuery(function($query) use($arrId, $status) {
            return $query
                ->join('categories', function ($join) {
                    $join->on('products.category_id', '=', 'categories.id')
                        ->where('categories.status','=', '1');
                })
                ->orderBy('products.id','desc')
                ->where('products.status', $status)
                ->whereIn('products.id', $arrId);
        })->all([
            'products.id',
            'products.name',
            'products.avatar',
            'products.price',
            'categories.name as cat_name'
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
