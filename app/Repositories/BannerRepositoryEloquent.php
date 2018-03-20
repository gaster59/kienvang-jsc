<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BannerRepository;
use App\Entities\Banner;
//use App\Validators\BannerValidator;

/**
 * Class BannerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BannerRepositoryEloquent extends BaseRepository implements BannerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    public function getBanner()
    {
        $res = $this->all([
            'id',
            'title',
            'avatar',
            'description'
        ]);
        return $res;
    }
    public function getBannerAboutNum($limit = 3, $field= null)
    {
        $res = $this->scopeQuery(function($query) {
        return $query
                ->where('banners.type', 1)
                ->orderBy('id','desc');
        })->paginate($limit, $field);
        return $res;
    }
    public function getBannerMain($where = null)
    {
        $res = $this->scopeQuery(function($query) use($where) {
            return $query
                    ->where($where);
        })->first();
        return $res;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
