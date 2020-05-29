<?php

namespace App\Repositories;

interface BaseEvaluationRepository{
    public function create();
    public function update();
    public function getByUserAndCycle(); 	
} 
?>