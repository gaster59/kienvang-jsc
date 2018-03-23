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

    /**
     * Get job has status = 1 and num record
     *
     * @param int $status
     * @param $num
     *
     * @return array
     */
    public function getJobAboutNum($status = 1, $num);
    public function getNewsCustomize($where = null, $limit = 20);
}
