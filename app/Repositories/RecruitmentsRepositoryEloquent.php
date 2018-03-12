<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RecruitmentsRepository;
use App\Entities\Recruitments;
use App\Validators\RecruitmentsValidator;

/**
 * Class RecruitmentsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RecruitmentsRepositoryEloquent extends BaseRepository implements RecruitmentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Recruitments::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
