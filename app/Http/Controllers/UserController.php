<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\User as ResourcesUser;
use App\Services\Users\RetrievingAllUsersService;
use App\Services\Users\RetrievingUserService;
use App\Services\Users\DeletingUserService;



class UserController extends Controller
{
    public function index( RetrievingAllUsersService $service, Request $request)
    {

        // $posts=User::paginate(10);
        // return  ResourcesUser::collection($posts);
        $output= $service->execute();
           return  ResourcesUser::collection($output);
    }

    public function show(RetrievingUserService $service ,$id)
    {
        return $service->execute($id);
    }

    public function destroy( $id, DeletingUserService $service)
    {



        return $service->execute($id);


    }

}
