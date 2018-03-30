<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BannerRepository
 * @package namespace App\Repositories;
 */
interface ApplyRepository extends RepositoryInterface
{
    /**
     * Get banner
     *
     * @return mixed
     */
    public function getApplyFirst($id);
    public function getApply($where, $field= null);
    public function getAllApply($where, $limit = 20, $field= null);
}
