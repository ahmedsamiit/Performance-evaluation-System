<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;

class RetrievingAllCriteriasService
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
     * retrieving all criterias service
     *
     * @return array
     */
    public function execute()
    {
        if (!$this->repo->getAll()->isEmpty()&&$this->repo->count()>0) {
            return $this->repo->getAll();
        } else {
            return response()->json([
                "message" => "criterias not found"
            ], 404);
        }


    /*try{
    $result=['status'=>200];
            $result['data']=$this->repo->getAll();}
            catch(Exception $e){
        $result=['status'=>404,'error'=>$e->getMessage()];
            }
return response()->json($result,$result['status']);*/
    }
}
