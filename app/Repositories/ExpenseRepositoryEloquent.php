<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ExpenseRepository;
use App\Entities\Expense;
use App\Validators\ExpenseValidator;

/**
 * Class ExpenseRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ExpenseRepositoryEloquent extends BaseRepository implements ExpenseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Expense::class;
    }

    /**
     * @inheritdoc
     */
    public function getExpense($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->join('categories', function ($join) {
                    $join->on('expenses.category_id', '=', 'categories.id')
                        ->where('categories.status','=', '1');
                })
                ->where('expenses.status', $status)
                ->orderBy('id', 'desc');
        })->paginate(env('PAGINATION',20), [
            'expenses.id',
            'expenses.name',
            'expenses.avatar',
            'expenses.price',
            'expenses.created_at',
            'categories.name as cat_name'
        ]);
        return $res;
    }

    /**
     * @inheritdoc
     */
    public function getAllExpense($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->join('categories', function ($join) {
                    $join->on('expenses.category_id', '=', 'categories.id')
                        ->where('categories.status','=', '1');
                })
                ->where('expenses.status', $status)
                ->orderBy('id', 'desc');
        })->all([
            'expenses.id',
            'expenses.name',
            'expenses.avatar',
            'expenses.price',
            'expenses.created_at',
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
