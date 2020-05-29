<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as ResourcesUser;
use App\Services\Users\RetrievingAllUsersService;



class UserController extends Controller
{
    public function index( RetrievingAllUsersService $service, Request $request)
    {

        // $posts=User::paginate(10);
        // return  ResourcesUser::collection($posts);
        $output= $service->execute();
           return  ResourcesUser::collection($output);
    }
}
