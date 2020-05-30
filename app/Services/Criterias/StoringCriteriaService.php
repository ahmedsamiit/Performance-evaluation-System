<?php

namespace App\Services\Criterias;
use Illuminate\Http\Request;

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
     * soring  criteria service
     *
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $data = $request->all();

        $criteria = $this->repo->create($data);
        if($criteria){
            return  response()->json($criteria);
        }
        return false;

    }


}
