<?php

namespace App\Services\Evaluation_Cycles;
use Illuminate\Http\Request;

use App\Repositories\Evaluation_CycleRepository;


class  StoringEvaluation_CycleService
{
    protected $repo;


    /**
     * CreatingEvaluation_CycleService instance
     *
     * @param evaluation_cyclerepository $repo
     */
    public function __construct(Evaluation_CycleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * soring  Evaluation_Cycle service
     *
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $data = $request->all();

        $evaluation_cycle = $this->repo->create($data);
        if($evaluation_cycle){
            return  response()->json($evaluation_cycle);
        }
        return false;

    }


}
