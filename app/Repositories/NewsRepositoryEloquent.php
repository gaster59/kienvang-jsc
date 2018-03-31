<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsRepository;
use App\Entities\News;
use App\Validators\NewsValidator;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    /**
     * @inheritdoc
     */
    public function getNews($status = 1, $numPage = 20)
    {
        $res = $this->scopeQuery(function($query) use($status) {
            return $query
                ->orderBy('id','desc')
                ->where('news.type', 1)
                ->where('news.status', $status);
        })->paginate(env('PAGINATION', $numPage), [
            'news.id',
            'news.name',
            'news.slug',
            'news.avatar',
            'news.description',
            'news.summary',
            'news.is_hot',
            'news.meta_keyword',
            'news.meta_description',
            'news.updated_at'
        ]);
        return $res;
    }
    /**
     * [getNewsCustomize description]
     * @param  [array] $where [description]
     * @param  integer $limit [description]
     * @return [array]        [description]
     */

    public function getNewsCustomize($where = null, $limit = 20){
        $res = $this->scopeQuery(function($query) use($where) {
            return $query
                ->orderBy('updated_at','desc')
                ->where($where);
        })->paginate( $limit, [
            'news.id',
            'news.name',
            'news.slug',
            'news.avatar',
            'news.description',
            'news.summary',
            'news.is_hot',
            'news.meta_keyword',
            'news.meta_description',
            'news.updated_at'
        ]);
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
