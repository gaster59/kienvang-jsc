<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CompaniesRepository
 * @package namespace App\Repositories;
 */
interface CompaniesRepository extends RepositoryInterface
{
    /**
     * Get company has status = 1
     *
     * @param int $status
     * @return array
     */
    public function getCompany($where = null,$limit=20);

    /**
     * Get all company has status = 1
     *
     * @param int $status
     *
     * @return array
     */
    public function getAllCompany($status = 1);
    public function getAllCompanyCustomize($where = null);
    /**
     * Get companies has status = 1
     * @param int $status
     * @param $num
     *
     * @return array
     */
    public function getCompanyAboutNum($status = 1, $num);
}
