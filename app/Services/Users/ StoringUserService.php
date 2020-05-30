<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;
use GuzzleHttp\Psr7\UploadedFile;

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
        if($request->avtar){

            $file = $request->avtar;
            $name = time() . $file->getClientOriginalName();
            $file->move('images' , $name);

        }
        $user = $this->repo->create($data);
        if($user){
            return  response()->json($user);
        }
        return false;

    }


}
