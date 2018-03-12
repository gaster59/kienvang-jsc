<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ExpenseRepository;

/**
 * Class StatisticController
 * @package App\Http\Controllers\Admin
 */
class StatisticController extends BaseController
{

    var $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        parent::__construct();
        $this->expenseRepository = $expenseRepository;
    }

    public function index()
    {
        $expenses = $this->expenseRepository->getAllExpense();
        foreach ($expenses as &$expense) {
            $date = $expense->created_at;
            $newDate = date("Y-m-d", strtotime($date));
            $expense->created_at = $newDate;
        }
        return view('admin.statistic.index', [
            'expenses' => $expenses,
            'title' => 'Thống kê chi tiêu'
        ]);
    }
}