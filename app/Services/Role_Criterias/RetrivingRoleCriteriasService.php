<?php

namespace App\Services\Role_Criterias;

use App\Repositories\RoleCriteriaRepository;
use App\Models\Criteria;
use App\Models\User;


class RetrivingRoleCriteriasService
{
    protected $repo;

    /**
     * Creating Role_Criterias instance
     *
     * @param RoleCriteriaRepository $repo
     */
    public function __construct(RoleCriteriaRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one Criteria service
     *
     * @return array
     */
    public function execute($roleId)
    {
        // if($this->repo->getAllById($roleId) != null&&$this->repo->count()>0){
            $user=User::find(Auth::id());
            dd($user);
            $criteriasId = [];
            $roleCriterias = $this->repo->getAllById($roleId);
            foreach ($roleCriterias as $value){
                array_push($criteriasId,$value->criteria_id);
            }

            $criterias = Criteria::whereIn('id',$criteriasId)->get();
            return $criterias;
        // }
        // else
        // {
        //     return response()->json([
        //         "message" => "criteria not found"
        //     ], 404);
        // }
    }
}
