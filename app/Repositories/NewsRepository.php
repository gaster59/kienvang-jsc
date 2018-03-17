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
     * @param int $numPage
     * @return array
     */
    public function getNews($status = 1, $numPage = 20);
    /**
     * [getNewsCustomize description]
     * @param  [type]  $where [description]
     * @param  integer $limit [description]
     * @return [type]         [description]
     */
    public function getNewsCustomize($where = null, $limit = 20);
}
