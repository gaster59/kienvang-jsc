<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ImportsRepository
 * @package namespace App\Repositories;
 */
interface ImportsRepository extends RepositoryInterface
{
    /**
     * Get imports
     *
     * @param int $status
     *
     * @return array
     */
    public function getImports($status = 1);

    /**
     * Get detail import id
     *
     * @param $order_import_id
     * @param int $status
     *
     * @return array
     */
    public function getDetailImport($order_import_id, $status = 1);
}
