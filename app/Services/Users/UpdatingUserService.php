<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;
use App\Models\User;


class UpdatingUserService
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
     * update user service
     *
     * @param string $password
     * @return array
     */
    public function execute(User $user, Request $request)
    {
        $data = $request->all();
        $this->repo->setModel($user);
        return $this->repo->updateExistingModel($data);
    }







}
