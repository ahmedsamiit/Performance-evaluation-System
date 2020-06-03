<?php

namespace App\Services\Evaluations;
use Illuminate\Http\Request;

use App\Repositories\EvaluationRepository;
use App\Models\Evaluation_Cycle;


class  RetrivingUserEvaluationService
{
    protected $repo;

    public function __construct(EvaluationRepository $repo)
    {
        $this->repo = $repo;

    }

    public function execute($userId, $cycleId)
    {  
        // $cycle_id = Evaluation_Cycle::where('is_current',1);
        $evaluations = $this->repo->getByUserAndCycle($userId, $cycleId);
        if($evaluations){
            return  response()->json($evaluations);
        }
        return false;

    }


}
?>