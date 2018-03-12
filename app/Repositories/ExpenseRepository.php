<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ExpenseRepository
 * @package namespace App\Repositories;
 */
interface ExpenseRepository extends RepositoryInterface
{
    /**
     * Get expense with status
     *
     * @param int $status
     *
     * @return array
     */
    public function getExpense($status = 1);

    /**
     * Get all expense with status
     * @param int $status
     *
     * @return mixed
     */
    public function getAllExpense($status = 1);
}
