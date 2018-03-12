<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\ImportsRepository;
use App\Repositories\OrderImportsRepository;
use App\Repositories\ProductRepository;
use App\Utils\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class ImportsController
 *
 * @package App\Http\Controllers\Ajax
 */
class ImportsController extends Controller
{

    /*
     * var Response
     */
    var $response;

    /**
     * @var ProductRepository
     */
    var $productRepository;

    /**
     * @var OrderImportsRepository
     */
    var $orderImportsRepository;

    /**
     * @var ImportsRepository
     */
    var $importsRepository;

    public function __construct(
        ProductRepository $productRepository,
        OrderImportsRepository $orderImportsRepository,
        ImportsRepository $importsRepository)
    {
        $this->response = new Response();
        $this->orderImportsRepository = $orderImportsRepository;
        $this->importsRepository = $importsRepository;
        $this->productRepository = $productRepository;
    }

    public function store(Request $request)
    {
        try {
            $userId = Auth::id();
            $arrProductId = $request->post('productId');
            $arrQty = $request->post('qty');

            if (is_null($userId)) {
                Log::error('Bạn chưa đăng nhập');
                $this->response->setAjaxJson(500, 'Bạn chưa đăng nhập');
            }

            // check count($arrProductId) and count($arrQty)
            if (count($arrProductId) == 0 || $arrQty == 0) {
                Log::error('Bạn chưa chọn sản phẩm hoặc chưa nhập giá');
                $this->response->setAjaxJson(500, 'Bạn chưa chọn sản phẩm hoặc chưa nhập giá');
            }

            // check error arrProductId
            $errProduct = '';
            $products = $this->productRepository->getAllProduct();
            $arrProduct = [];
            foreach ($products as $item) {
                $arrProduct[] = $item->id;
            }
            foreach ($arrProductId as $item) {
                if (!in_array($item, $arrProduct)) {
                    $errProduct = 'Sản phẩm của bạn không có trong danh sách';
                    break;
                }
            }
            if ($errProduct != '') {
                Log::error($errProduct);
                $this->response->setAjaxJson(500, $errProduct);
            }

            // check error arrQty
            $errQty = '';
            foreach ($arrQty as $item) {
                if (!is_numeric($item)) {
                    $errQty = 'Bạn phải nhập số cho số lượng';
                    break;
                }
            }
            if ($errQty != '') {
                Log::error($errQty);
                $this->response->setAjaxJson(500, $errQty);
            }

            $lengthProductId = count($arrProductId);
            $arrImports = [];
            for ($i = 0; $i < $lengthProductId; $i++) {
                $isExists = false;
                foreach ($arrImports as $key => $val) {
                    if ($arrProductId[$i] == $key) {
                        $val += $arrQty[$i];
                        $arrImports[$key] = $val;
                        $isExists = true;
                        break;
                    }
                }
                if ($isExists == false) {
                    $arrImports[$arrProductId[$i]] = intval($arrQty[$i]);
                }
            }

            // save order imports and import
            $getProductInArr = $this->productRepository->getProductByIds($arrProductId);

            // get sum total
            $total = 0;
            foreach ($arrImports as $key => $val) {
                foreach ($getProductInArr as $item) {
                    if ($key == $item->id) {
                        $total += ($item->price * $val);
                        break;
                    }
                }
            }

            // save order imports
            $orderInserted = $this->orderImportsRepository->create([
                'total' => $total,
                'user_id' => $userId,
                'info' => '',
                'status' => 1
            ]);
            // get id of order inserted
            $orderImportId = $orderInserted->id;

            // save imports
            foreach ($arrImports as $key => $val) {
                foreach ($getProductInArr as $item) {
                    if ($key == $item->id) {
                        $dataImport = [
                            'product_id' => $item->id,
                            'product_name' => $item->name,
                            'product_price' => $item->price,
                            'qty' => $val,
                            'order_import_id' => $orderImportId
                        ];
                        $this->importsRepository->create($dataImport);
                        break;
                    }
                }
            }

            $arr = [];
            $this->response->setAjaxJson(200, '', $arr);
        } catch (\Exception $exception) {
            $this->response->setAjaxJson(500, $exception->getMessage());
        }

    }

    public function getDetail(Request $request)
    {
        $userId = Auth::id();
        $order_import_id = $request->post('id');

        if (is_null($userId)) {
            Log::error('Bạn chưa đăng nhập');
            $this->response->setAjaxJson(500, 'Bạn chưa đăng nhập');
        }

        $detailImport = $this->importsRepository->getDetailImport($order_import_id);
        $this->response->setAjaxJson(200, '', $detailImport);
    }

}
