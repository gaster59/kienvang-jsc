<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BannerRequest;
use App\Repositories\BannerRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Request;

class BannerController extends BaseController
{
    /**
     * @var BannerRepository $bannerRepository
     */
    var $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        parent::__construct();
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Index action - Get list banner
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $banners = $this->bannerRepository->getBanner();
        return \view('admin.banner.index',[
            'banners' => $banners,
            'title' => 'Danh sách banner'
        ]);
    }

    /**
     * Add action - add banner
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        return \view('admin.banner.add', [
            'title' => 'Thêm banner'
        ]);
    }

    public function edit(Request $request, $id)
    {
        $banner = $this->bannerRepository->findWhere([
            'id' => $id,
        ]);

        if (count($banner) == 0) {
            return redirect(route('banner'));
        }

        $banner = $banner[0];
        return \view('admin.banner.edit', [
            'banner' => $banner,
            'title' => 'Cập nhật banner'
        ]);
    }

    /**
     * Handle process data Product
     *
     * @param BannerRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BannerRequest $request)
    {
        $method = $request->post('method');
        if ($method == 'add') {
            // Handle add product
            $this->handleAddBanner($request);
            return redirect(route('banner'));
        }
        if ($method == 'edit') {
            // Handle edit product
            $id = $request->id;
            $banner = $this->bannerRepository->findWhere([
                'id' => $id,
            ]);
            if (count($banner) == 0) {
                return redirect(route('product'));
            }

            $this->handleEditBanner($request, $banner);
            return redirect(route('banner'));
        }
    }

    /**
     * Handle add banner
     *
     * @param Request $request
     *
     * @return void
     */
    private function handleAddBanner($request)
    {
        $description = $request->post('description', '');
        $avatar = $request->file('avatar');
        $destination = public_path('/banner');

        $fileName = '';
        if (!is_null($avatar)) {
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $banner = [
            'description' => $description,
            'avatar' => $fileName,
        ];
        $this->bannerRepository->create($banner);
    }

    /**
     * Handle edit banner
     *
     * @param Request $request
     * @param $product
     *
     * @return void
     */
    private function handleEditBanner($request, $banner)
    {
        $description = $request->post('description', '');

        $avatar = $request->file('avatar');
        $destination = public_path('/banner');

        $fileName = $banner[0]->avatar;
        if (!is_null($avatar)) {
            $fileSystem = new Filesystem();
            if ($fileSystem->exists($destination.'/'.$fileName)) {
                $fileSystem->delete($destination.'/'.$fileName);
            }
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move($destination, $fileName);
        }
        $banner = [
            'description' => $description,
            'avatar' => $fileName,
        ];
        $this->bannerRepository->update($banner, $request->id);
    }

}