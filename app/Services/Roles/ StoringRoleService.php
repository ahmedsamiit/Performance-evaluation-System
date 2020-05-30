<?php

namespace App\Services\Roles;
use Illuminate\Http\Request;

use App\Repositories\RoleRepository;


class  StoringRoleService
{
    protected $repo;
    //protected $service;

    /**
     * Creating RoleService instance
     *
     * @param roleepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * soring  role service
     *
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $data = $request->all();

        $role = $this->repo->create($data);
        if($role){
            return  response()->json($role);
        }
        return false;

    }


}
