<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository;

class JobsController extends Controller
{

    /**
     * @var JobRepository $jobRepository
     */
    var $jobRepository;


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
    public function apply($id, $slug=null)
    {
        if (!is_numeric($id)) {
            return redirect(route('front.jobs.detail', ['id'=>$id, 'slug'=> $slug]));
        }
        $dataJob = $this->jobRepository->findWhere([
            'id' => $id,
            'status' => 1
        ]);
        if (count($dataJob) == 0) {
            return redirect(route('front.jobs.detail', ['id'=>$id, 'slug'=> $slug]));
        }


        $ar = [['jobs.status', '=', '1'],['jobs.id', '<>', $id], ['jobs.major_id', '=', $dataJob[0]->major_id]];
        $jobsList = $this->jobRepository->getNewsCustomize( $ar  , 10);
        return view('jobs.apply', [
            'dataJob'  => $dataJob[0],
            'jobsList'  => $jobsList
        ]);
    }
}