<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Admin
 */
class ProductController extends BaseController
{

    /**
     * @var ProductRepository $productRepository
     */
    var $productRepository;

    /**
     * @var CategoriesRepository $categoriesRepository
     */
    var $categoriesRepository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     * @param CategoriesRepository $categoriesRepository
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepository, CategoriesRepository $categoriesRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Index action - Get list product
     *
     * @param Request $request
     *
     * @return View
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->getProduct();
        return \view('admin.product.index',[
            'products' => $products,
            'title' => 'Danh sách sản phẩm'
        ]);
    }

    /**
     * Add product
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        $categories = $this->categoriesRepository->getCategory();
        return \view('admin.product.add', [
            'categories' => $categories,
            'title' => 'Thêm sản phẩm'
        ]);
    }

    /**
     * Edit product
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $product = $this->productRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);

        if (count($product) == 0) {
            return redirect(route('product'));
        }

        $product = $product[0];
        $categories = $this->categoriesRepository->getCategory();
        return \view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'title' => 'Cập nhật sản phẩm'
        ]);
    }

    /**
     * Handle process data Product
     *
     * @param ProductRequest $request
     *
     * @return void
     */
    public function store(ProductRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            // Handle add product
            $this->handleAddProduct($request);
            return redirect(route('product'));
        }
        if ($method == 'edit') {
            // Handle edit product
            $id = $request->id;
            $product = $this->productRepository->findWhere([
                'id' => $id,
                'status' => 1
            ]);
            if (count($product) == 0) {
                return redirect(route('product'));
            }

            $this->handleEditProduct($request, $product);
            return redirect(route('product'));
        }
    }

    /**
     * Handle add product
     *
     * @param Request $request
     *
     * @return void
     */
    private function handleAddProduct($request)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $summary = $request->post('summary', '');
        $category_id = $request->post('category_id', '');
        $price = $request->post('price', 0);
        $status = 1;

        $avatar = $request->file('avatar');
        $destination = public_path('/avatar');

        $fileName = '';
        if (!is_null($avatar)) {
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $product = [
            'name' => $name, 'description' => $description,
            'summary' => $summary, 'category_id' => $category_id,
            'price' => $price, 'avatar' => $fileName,
            'info' => '',  'slug' => '',
            'status' => $status
        ];
        $this->productRepository->create($product);
    }

    /**
     * Handle edit product
     *
     * @param Request $request
     * @param $product
     *
     * @return void
     */
    private function handleEditProduct($request, $product)
    {
        $name = $request->post('name', '');
        $description = $request->post('description', '');
        $summary = $request->post('summary', '');
        $category_id = $request->post('category_id', '');
        $price = $request->post('price', 0);
        $status = 1;

        $avatar = $request->file('avatar');
        $destination = public_path('/avatar');

        $fileName = $product[0]->avatar;
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
            'summary' => $summary, 'category_id' => $category_id,
            'price' => $price, 'avatar' => $fileName,
            'info' => '',  'slug' => '',
            'status' => $status
        ];
        $this->productRepository->update($product, $request->id);
    }
}
