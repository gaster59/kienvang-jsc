<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderDetailsRepository;
use App\Entities\OrderDetails;
use App\Validators\OrderDetailsValidator;

/**
 * Class OrderDetailsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderDetailsRepositoryEloquent extends BaseRepository implements OrderDetailsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderDetails::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
