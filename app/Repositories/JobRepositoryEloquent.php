<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\JobRepository;
use App\Entities\Job;
use App\Validators\JobValidator;

/**
 * Class JobRepositoryEloquent
 * @package namespace App\Repositories;
 */
class JobRepositoryEloquent extends BaseRepository implements JobRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Job::class;
    }

    /**
     * @inheritdoc
     */
    public function getJob($status = 1)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->join('majors', function ($join) {
                    $join->on('jobs.major_id', '=', 'majors.id')
                        ->where('majors.status','=', '1');
                })
                ->join('companies', function ($join) {
                    $join->on('jobs.company_id', '=', 'companies.id')
                        ->where('companies.status','=', '1');
                })
                ->orderBy('id','desc')
                ->where('jobs.status', $status);
        })->paginate(env('PAGINATION',20), [
            'jobs.id',
            'jobs.name',
            'majors.name as major_name',
            'companies.name as company_name',
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
