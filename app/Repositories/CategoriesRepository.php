<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoriesRepository
 * @package namespace App\Repositories;
 */
interface CategoriesRepository extends RepositoryInterface
{
    /**
     * Get category has status = 1
     *
     * @param int | $status
     * @return mixed
     */
    public function getCategory($status = 1);
}
