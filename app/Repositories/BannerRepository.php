<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BannerRepository
 * @package namespace App\Repositories;
 */
interface BannerRepository extends RepositoryInterface
{
    /**
     * Get banner
     *
     * @return mixed
     */
    public function getBanner();

    public function getBannerAboutNum($limit=3, $field=null);
    public function getBannerMain($where = null);
}
