<?php

namespace App\Services\User_Indicators;

use App\Repositories\EvaluationRepository;


class CreateUserIndicatorService{

    protected $repo;

    public function __construct(EvaluationRepository $repo)
    {
        $this->repo = $repo;
    }

    public function execute(Request $request)
    {
        return $this->repo->create($request);
    }

}



?>