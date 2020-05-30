<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;

class RetrievingCriteriaService
{
    protected $repo;

    /**
     * Creating RoleService instance
     *
     * @param criteriarepository $repo
     */
    public function __construct(CriteriaRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one Criteria service
     *
     * @return array
     */
    public function execute($id)
    {
        return $this->repo->getById($id);
    }
}
