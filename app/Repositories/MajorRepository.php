<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface MajorRepository
 * @package namespace App\Repositories;
 */
interface MajorRepository extends RepositoryInterface
{
    /**
     * Get major has status = 1
     *
     * @param int | $status
     * @return mixed
     */
    public function getMajor($status = 1);
}
