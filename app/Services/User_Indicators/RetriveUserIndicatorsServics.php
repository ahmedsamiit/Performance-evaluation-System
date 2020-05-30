<?php

namespace App\Services\User_Indicators;

use App\Repositories\EvaluationRepository;


class RetriveUserIndicatorsService{

    protected $repo;

    public function __construct(EvaluationRepository $repo)
    {
        $this->repo = $repo;
    }

    public function execute($user_id)
    {
        $cycle_id = Evaluation_Cycle::where('is_current','true');
        return $this->repo->getByUserAndCycle($user_id, $cycle_id);
    }

}



?>