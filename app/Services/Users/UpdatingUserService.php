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
    public function execute(User $user, array $request)
    {

        $this->repo->setModel($user);
        if($request['avatar']){

            $file = $request['avatar'];
            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $request['avatar']=$name;
        }
        return $this->repo->updateExistingModel($request);
    }







}
