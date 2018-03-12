<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ImportsRepository;
use App\Repositories\OrderImportsRepository;
use App\Repositories\ProductRepository;

/**
 * Class ImportsController
 *
 * @package App\Http\Controllers\Admin
 */
class ImportsController extends BaseController
{

    /**
     * @var ImportsRepository
     */
    var $importsRepository;

    /**
     * @var OrderImportsRepository
     */
    var $orderImportsRepository;

    /**
     * @var ProductRepository
     */
    var $productRepository;

    public function __construct(
        ImportsRepository $importsRepository,
        OrderImportsRepository $orderImportsRepository,
        ProductRepository $productRepository)
    {
        $this->importsRepository = $importsRepository;
        $this->orderImportsRepository = $orderImportsRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $orderImports = $this->orderImportsRepository->getOrderImports();
//        dd($orderImports);
        return view('admin.order_import.index', [
            'orderImports' => $orderImports,
            'title' => 'Danh sách nhập kho'
        ]);
    }

    public function add()
    {
        $products = $this->productRepository->getAllProduct();
        $jsonProducts = json_encode($products);

        return view('admin.order_import.add', [
            'products' => $products,
            'jsonProducts' => $jsonProducts,
            'title' => 'Thêm nhập kho'
        ]);
    }
}