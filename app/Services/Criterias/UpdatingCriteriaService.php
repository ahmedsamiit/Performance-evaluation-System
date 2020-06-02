<?php

namespace App\Services\Criterias;
use Illuminate\Http\Request;

use App\Repositories\CriteriaRepository;


class UpdatingCriteriaService
{
    protected $repo;


    /**
     * Creating criteriaService instance
     *
     * @param criteriarepository $repo
     */
    public function __construct(CriteriaRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * update criteria service
     *
     * @param $id
     * @param array $request
     * @return array
     */
    public function execute($id, array $request)
    {
        $data = $request;


        if($this->repo->getById($id)->update($data)){
            return  response()->json($data);
        }
        return false;
    }







}
