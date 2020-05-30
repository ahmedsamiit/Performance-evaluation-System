<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Roles\RetrievingAllRolesService;
use App\Services\Roles\RetrievingRoleService;
use App\Services\Roles\DeletingRoleService;
use App\Services\Roles\StoringRoleService;
use App\Services\Roles\UpdatingRoleService;

class RoleController extends Controller
{
    public function index(RetrievingAllRolesService $service, Request $request)
    {

        // $posts=User::paginate(10);
        // return  ResourcesUser::collection($posts);

           return  $service->execute();
    }

    public function store(Request $request , StoringRoleService $service)
    {
        return $service->execute($request);

    }
    public function destroy( $id, DeletingRoleService $service)
    {
        return $service->execute($id);

    }
    public function show(RetrievingRoleService $service ,$id)
    {
        return $service->execute($id);
    }
    public function update($id,Request $request , UpdatingRoleService $service)
    {
        return $service->execute($id,$request);

    }
}
