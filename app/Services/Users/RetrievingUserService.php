<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;

class RetrievingUserService
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
     * retrieving one user service
     *
     * @return array
     */
    public function execute($id)
    {
        return $this->repo->getById($id);
    }
}
