<?php

namespace App\Factory;
use App\Factory\CriteriaFactory;

class DirectCriteriaFactory extends CriteriaFactory {

    public function calculate($value){
        return $value;
    }
}


?>