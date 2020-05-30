<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;


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
     * soring  user service
     *
     * @param string $password
     * @return array
     */
    public function execute(Request $request)
    {
        $data = $request->all();
        // if($request->image_path){
        //     $data['image_path'] = Upload::public_uploads($request->image_path, Product::DIR);
        // }
        $user = $this->repo->create($data);
        if($user){
            return  response()->json($user);
        }
        return false;

    }


}
