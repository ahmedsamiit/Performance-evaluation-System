<?php

namespace App\Services\Evaluations;
use Illuminate\Http\Request;

use App\Repositories\CriteriaRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\CriteriaTypeRepository;
use App\Models\Evaluation_Cycle;
use App\Models\Criteria;
use App\Models\CriteriaType;
use App\Services\Criterias\RetrievingCriteriaService;
use App\Services\Criteria_Types\RetrivingCriteriaTypeService;
use App\Factory\DirectCriteriaFactory;
use App\Factory\AverageCriteriaFactory;



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
        $this->f1($evaluations);
        if($evaluations){
            return  response()->json($evaluations);
        }
        return false;

    }

    function f1($evaluations){
        $direct = [];
        $avg = [];
        $model = new Criteria();
        $repo = new CriteriaRepository($model);
        $service = new RetrievingCriteriaService($repo);
        $modelType = new CriteriaType();
        $repoType = new CriteriaTypeRepository($modelType);
        $serviceType = new RetrivingCriteriaTypeService($repoType);
         foreach ($evaluations as  $value) {
        $criteria = $service->execute($value->criteria_id);
        $type = $serviceType->execute($criteria->type_id);
        if ($type->type == 'direct'){
            array_push($direct,$value);
        }
        else{
            array_push($avg,$value);
        }
        }
        $factory = new DirectCriteriaFactory();
        $factory = new AverageCriteriaFactory();
        $arr = $factory->calculate($direct);
        $arr2 = $factory->calculate($avg);
        // dd($arr);
        dd($arr2);
        //access
    }


    //fn check and filter criterias (evaluations)
    //loop & check
    
    //if direct 
    //arr []
    //av call av =>
    //append mn av ll arr
    /// return arr 


    /*
    loop evaluations
    check if 
    1- direct => push arr[]
    else 
    2- avg =>> arr2  
 end for
 instance of directfactory -.calc (arr)
 instance of avgfactory -> calc (arr2)
 */












}
?>