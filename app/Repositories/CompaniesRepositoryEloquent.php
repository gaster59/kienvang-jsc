<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CompaniesRepository;
use App\Entities\Companies;
use App\Validators\CompaniesValidator;

/**
 * Class CompaniesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CompaniesRepositoryEloquent extends BaseRepository implements CompaniesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Companies::class;
    }

    /**
     * @inheritdoc
     */
    public function getCompany($where = null, $limit=20)
    {
        $res = $this->scopeQuery(function($query) use($where) {
            return $query
                    ->orderBy('id','desc')
                    ->where($where);
        })->paginate($limit, [
            'companies.id',
            'companies.name',
            'companies.avatar',
            'companies.scale',
            'companies.founding',
        ]);
        return $res;
    }

    /**
     * @inheritdoc
     */
    public function getAllCompany($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->orderBy('id','desc')
                ->where('companies.status', $status);
        })->all([
            'companies.id',
            'companies.name',
            'companies.avatar',
            'companies.scale',
            'companies.founding',
        ]);
        return $res;
    }
    public function getAllCompanyCustomize($where = null){
        $res = $this->scopeQuery(function($query) use($where) {
            return $query
                ->orderBy('id','desc')
                ->where($where);
        })->all([
            'companies.id',
            'companies.name',
            'companies.avatar',
            'companies.scale',
            'companies.founding',
        ]);
        return $res;
    }

    public function getCompanyAboutNum($status = 1, $num)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->orderBy('id','desc')
                ->where('companies.status', $status);
        })->paginate($num, [
            'companies.id',
            'companies.name',
            'companies.avatar',
            'companies.scale',
            'companies.founding',
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
