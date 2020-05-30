<?php

namespace App\Services\Roles;

use App\Repositories\RoleRepository;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingRoleService
{
    protected $repo;

    /**
     * Creating RoleService instance
     *
     * @param rolepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Delete  role service
     *
     * @return array
     */
    public function execute($id) : bool
    {

        return $this->repo->getById($id)->delete();
    }
}
