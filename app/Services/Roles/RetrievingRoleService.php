<?php

namespace App\Services\Roles;

use App\Repositories\RoleRepository;

class RetrievingRoleService
{
    protected $repo;

    /**
     * Creating RoleService instance
     *
     * @param roleepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one user service
     *
     * @return array
     */
    public function execute($id)
    {
        return $this->repo->getById($id);
    }
}
