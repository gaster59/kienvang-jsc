<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ExpenseRequest;
use App\Repositories\CategoriesRepository;
use App\Repositories\ExpenseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class ExpensesController
 * @package App\Http\Controllers\Admin
 */
class ExpensesController extends BaseController
{
    /**
     * @var ExpenseRepository $expensesRepository
     */
    var $expensesRepository;

    /**
     * @var CategoriesRepository $categoriesRepository
     */
    var $categoriesRepository;

    /**
     * ExpensesController constructor.
     *
     * @param ExpenseRepository $expenseRepository
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(ExpenseRepository $expenseRepository, CategoriesRepository $categoriesRepository)
    {
        parent::__construct();
        $this->expensesRepository = $expenseRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Index action - Get list expenses
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $expenses = $this->expensesRepository->getExpense();
        return view('admin.expense.index',[
            'expenses' => $expenses,
            'title' => 'Danh sách chi tiêu'
        ]);
    }

    /**
     * Add action - Add expense
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $categories = $this->categoriesRepository->getCategory();

        return view('admin.expense.add', [
            'categories' => $categories,
            'title' => 'Thêm sản phẩm'
        ]);
    }

    /**
     * Edit action
     *
     * @param Integer $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $expense = $this->expensesRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($expense) == 0) {
            return redirect(route('expense'));
        }

        $expense = $expense[0];
        $categories = $this->categoriesRepository->getCategory();
        return view('admin.expense.edit', [
            'expense' => $expense,
            'categories' => $categories,
            'title' => 'Cập nhật chi tiêu'
        ]);
    }

    /**
     * Handle add and edit expense
     *
     * @param ExpenseRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ExpenseRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            $this->handleAdd($request);
            return redirect(route('expense'));
        }
        if ($method == 'edit') {
            $id = $request->id;
            $expense = $this->expensesRepository->findWhere([
                'id' => $id,
                'status' => 1
            ]);
            if (count($expense) == 0) {
                return redirect(route('expense'));
            }

            $this->handleEdit($request, $expense);
            return redirect(route('expense'));
        }
    }

    /**
     * Handle add expense
     *
     * @param ExpenseRequest $request
     *
     * @return void
     */
    private function handleAdd(ExpenseRequest $request)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $category_id = $request->post('category_id', '');
        $price = $request->post('price', 0);
        $user_id = Auth::id();
        $status = 1;

        $avatar = $request->file('avatar');
        $destination = public_path('/expense');

        $fileName = '';
        if (!is_null($avatar)) {
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $expense = [
            'name' => $name, 'description' => $description,
            'category_id' => $category_id, 'user_id' => $user_id,
            'price' => $price, 'avatar' => $fileName,
            'info' => '',  'slug' => '',
            'status' => $status
        ];
        $this->expensesRepository->create($expense);
    }

    /**
     * Handle edit expense
     *
     * @param ExpenseRequest $request
     * @param $expense
     *
     * @return void
     */
    private function handleEdit(ExpenseRequest $request, $expense)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $category_id = $request->post('category_id', '');
        $price = $request->post('price', 0);
        $user_id = Auth::id();
        $status = 1;

        $avatar = $request->file('avatar');
        $destination = public_path('/expense');

        $fileName = $expense[0]->avatar;
        if (!is_null($avatar)) {
            $fileSystem = new Filesystem();
            if ($fileSystem->exists($destination.'/'.$fileName)) {
                $fileSystem->delete($destination.'/'.$fileName);
            }
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $product = [
            'name' => $name, 'description' => $description,
            'category_id' => $category_id, 'user_id' => $user_id,
            'price' => $price, 'avatar' => $fileName,
            'info' => '',  'slug' => '',
            'status' => $status
        ];
        $this->expensesRepository->update($product, $request->id);
    }
}