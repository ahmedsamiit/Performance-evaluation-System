<?php

namespace App\Services\Criterias;
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
        if ($criteria) {
            return response()->json($criteria);
        } else {
            return response()->json([
                "message" => "criteria can not create"
            ], 404);
        }

        return false;
    }

}
