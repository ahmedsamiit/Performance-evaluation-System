<?php

namespace App\Services\Roles;
use Illuminate\Http\Request;

use App\Repositories\RoleRepository;


class UpdatingRoleService
{
    protected $repo;
    //protected $service;

    /**
     * Creating roleService instance
     *
     * @param roleepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * update user service
     *

     * @return array
     */
    public function execute( $id, Request $request)
    {
        $data = $request->all();





        if($this->repo->getById($id)->update($data)){
             return  response()->json($data);
        }
        return false;
    }







}
