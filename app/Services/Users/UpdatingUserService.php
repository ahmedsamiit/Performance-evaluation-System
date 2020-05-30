<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;
use App\User;

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
    public function execute( $id, Request $request)
    {
        $data = $request->all();


        // if($request->avtar){
        //     $data['avtar'] = Upload::public_uploads($request->image_path, Product::DIR);
        // }



        if($this->repo->getById($id)->update($data)){
             return  response()->json($data);
        }
        return false;
    }







}
