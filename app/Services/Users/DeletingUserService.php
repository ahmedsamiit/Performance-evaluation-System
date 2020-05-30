<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use App\User;
use phpDocumentor\Reflection\Types\Boolean;

class DeletingUserService
{
    protected $repo;

    /**
     * Creating UserService instance
     *
     * @param Userepository $repo
     */
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Delete  user service
     *
     * @return array
     */
    public function execute($id) : bool
    {

        return $this->repo->getById($id)->delete();
    }
}
