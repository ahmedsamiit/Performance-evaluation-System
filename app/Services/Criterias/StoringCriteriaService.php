<?php

namespace App\Services\Criterias;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCriteriaRequest;

use App\Repositories\CriteriaRepository;


class  StoringCriteriaService
{
    protected $repo;


    /**
     * Creating CriteriaService instance
     *
     * @param criteriarepository $repo
     */
    public function __construct(CriteriaRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * storing  criteria service
     *
     *
     *
     * @param array $request
     * @return array
     */
    public function execute(array $request)
    {

        $data = $request;

        $criteria = $this->repo->create($data);
        if($criteria){
            return  response()->json($criteria);
        }
        return false;

    }




}