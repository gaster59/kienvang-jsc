<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface JobRepository
 * @package namespace App\Repositories;
 */
interface JobRepository extends RepositoryInterface
{
    /**
     * Get job has status = 1
     *
     * @param int $status
     *
     * @return array
     */
    public function getJob($status = 1);
}
