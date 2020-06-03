<?php

namespace App\Services\Evaluation_Cycles;
use App\Models\Evaluation_cycle;
use Illuminate\Support\Arr;

use App\Repositories\Evaluation_CycleRepository;
use Carbon\Carbon;

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
     * @param array $request
     * @return array
     */
    public function execute(array $request)
    {
        $start=$request['start'];
        $dt = Carbon::create($start);
        $cycle=$request['cycle'];

        $end=$dt->addMonth($cycle);
        $request['end'] = $end;

        $evaluation_cycle = $this->repo->create($request);
        if($evaluation_cycle){
            return  response()->json($evaluation_cycle);
        }
        return false;

    }


}
