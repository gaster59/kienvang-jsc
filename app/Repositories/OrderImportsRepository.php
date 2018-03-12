<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderImportsRepository
 * @package namespace App\Repositories;
 */
interface OrderImportsRepository extends RepositoryInterface
{
    /**
     * Get order imports
     *
     * @param int $status
     *
     * @return array
     */
    public function getOrderImports($status = 1);

}
