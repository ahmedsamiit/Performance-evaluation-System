<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;
use App\Models\User;
use Spatie\Permission\Models\Role;



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
        // if($request['avatar']){

        //     $file = $request['avatar'];
        //     $name = $file->getClientOriginalName();
        //     $file->move('images' , $name);
        //     $request['avatar']=$name;
        // }

        $role = Role::find($request['role_id']);
        if(!$user->hasRole($role)){
            $oldRole = model_has_role::where('model_id',$user.id)
            ->update(['role_id' =>  $request['role_id']]);
            // $user->removeRole($oldRole);
            //    $user->assignRole($role);
        }
        return $this->repo->updateExistingModel($request);
        
    }

}
