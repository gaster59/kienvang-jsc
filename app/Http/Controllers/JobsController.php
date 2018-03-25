<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository;

class JobsController extends Controller
{

    /**
     * @var JobRepository $jobRepository
     */
    var $jobRepository;

    /**
     * @var BannerRepository $bannerRepository
     */
    var $bannerMain;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function detail($id, $slug=null)
    {
        if (!is_numeric($id)) {
            return redirect(route('front.index'));
        }

        $dataJob = $this->jobRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);
        if (count($dataJob) == 0) {
            return redirect(route('front.index'));
        }

        /**
         * List news
         */
        $ar = [['jobs.status', '=', '1'],['jobs.id', '<>', $id]];
        $jobsList = $this->jobRepository->getNewsCustomize( $ar  , 10);
        return view('jobs.detail', [
            'dataJob'  => $dataJob[0],
            'jobsList'  => $jobsList
        ]);
    }
}