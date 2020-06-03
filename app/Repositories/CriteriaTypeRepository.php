<?php

namespace App\Repositories;

use App\Models\Criteria_Type;


class CriteriaTypeRepository extends BaseRepository
{
   
    public function __construct(Criteria_Type $criteriatype)
    {
        parent::__construct($criteriatype);
    }
}
