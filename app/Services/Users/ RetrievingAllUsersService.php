<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;

class RetrievingAllUsersService
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
     * retrieving all users service
     *
     * @return array
     */
    public function execute()
    {
        return $this->repo->getAll();
    }
}
