<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingCriteriaService
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
     * Delete  criteria service
     *
     * @return array
     */
    public function execute($id) : bool
    {

        return $this->repo->getById($id)->delete();
    }
}
