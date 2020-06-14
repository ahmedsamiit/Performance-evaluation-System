<?php

namespace App\Services\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\EvaluationRepository;
use App\Models\Evaluation_Cycle;

use App\Models\Evaluation;
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
        $user_id = $data['user_id'];
        $evaluator_id= $data['evaluator_id'];
        $cycle_id = Evaluation_Cycle::where('is_current',1)->first();
        $data['cycle_id'] = $cycle_id->id;
        $evaluation_user = DB::table('evaluations')->where('user_id',$user_id)->first();
        $evaluation_cycle_id=$data['cycle_id'];
        $evaluation_time_cycle= DB::table('evaluations')->where('cycle_id',$evaluation_cycle_id)->first();
        $evaluation_evaluator = DB::table('evaluations')->where('evaluator_id',$evaluator_id)->first();
        if ($evaluation_evaluator != null&&$evaluation_user!= null&&$evaluation_time_cycle!= null) {
           return  response()->json(['error_message'=>'you evaluate employee before']);
        }
        
        else{
       
        // return  response()->json($data);
        $evaluation = $this->repo->create($data);
        if($evaluation){
            return  response()->json($evaluation);
        }
    }
        return false;

    }


}
?>