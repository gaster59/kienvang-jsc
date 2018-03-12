<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 * @package namespace App\Repositories;
 */
interface NewsRepository extends RepositoryInterface
{
    /**
     * Get news has status = 1
     *
     * @param int $status
     * @return array
     */
    public function getNews($status = 1);
}
