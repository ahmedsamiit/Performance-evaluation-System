<?php

namespace App\Repositories;

use App\BaseEvaluationRepository;

class EvaluationRepository implements BaseEvaluationRepository{
    private $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(){

    }
    public function update(){

    }
    public function getByUserAndCycle(){

    }
}

?>