<?php

namespace App\Services\Evaluations;
use Illuminate\Http\Request;

use App\Repositories\EvaluationRepository;
use App\Models\Evaluation_Cycle;


class  StoringEvaluationService
{
    protected $repo;

    public function __construct(EvaluationRepository $repo)
    {
        $this->repo = $repo;

    }

    public function execute(Request $request)
    {
        $data = $request->all();
        $cycle_id = Evaluation_Cycle::where('is_current',1)->first();
        $data['cycle_id'] = $cycle_id->id;
        // return  response()->json($data);
        $evaluation = $this->repo->create($data);
        if($evaluation){
            return  response()->json($evaluation);
        }
        return false;

    }


}
?>