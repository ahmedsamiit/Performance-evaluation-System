<?php

namespace App\Services\Evaluation_Cycles;
use Illuminate\Http\Request;

use App\Repositories\Evaluation_CycleRepository;


class UpdatingEvaluation_CycleService
{
    protected $repo;


    /**
     * Creating indicatorService instance
     *
     * @param Evaluation_Cyclerepository $repo
     */
    public function __construct(Evaluation_CycleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * update Indicator service
     *

     * @return array
     */
    public function execute($id, Request $request)
    {
        $data = $request->all();


        if($this->repo->getById($id)->update($data)){
             return  response()->json($data);
        }
        return false;
    }







}
