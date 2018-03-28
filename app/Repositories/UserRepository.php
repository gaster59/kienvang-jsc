<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BannerRepository
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    /**
     * Get banner
     *
     * @return mixed
     */
    public function getUser($id);
    public function getAllUser($where, $limit = 20, $field= null);
}
