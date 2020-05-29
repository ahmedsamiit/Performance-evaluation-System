<?php

namespace App\Services\Users;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Enums\Status;
class StoringUserService
{
    protected $repo;
    //protected $service;

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
     * @param string $password
     * @return array
     */
    public function execute(AbstractRequest $input)
    {
        return [
            'data' => [
                'model' => $this->UserRepository->create([
                    'name' => $input->getName(),
                    'email' => $input->getEmail(),
                    'password' => $input->getPassword(),
                    'supervisor' => $input->getSupervisor(),
                    'hiring-date' => $input->getHiring-date()
                ])
            ],
            'status' => Status::SUCCESS
        ];
    }




    }
}
