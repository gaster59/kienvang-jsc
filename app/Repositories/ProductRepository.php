<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    /**
     * Get product has status = 1
     *
     * @param int $status
     * @return array
     */
    public function getProduct($status = 1);

    /**
     * Get all product has status = 1
     *
     * @param int $status
     *
     * @return array
     */
    public function getAllProduct($status = 1);

    /**
     * Get product by array ids
     *
     * @param $arrId
     * @param int $status
     *
     * @return array
     */
    public function getProductByIds($arrId, $status = 1);
}
