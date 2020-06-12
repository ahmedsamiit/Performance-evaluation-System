<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;

class RetrivingUsersBySupervisorService
{
    protected $repo;

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
     * retrieving  users service for specific supervisor
     *
     * @return array
     */
    public function execute($role,$id)
    {
        if ($role == 'Manager' || $role == 'Senior Developer'){
            $users = $this->repo->getBySupervisorId($id);
            return $users;
        }
        elseif ($role == 'ProductOwner') {
            $users = $this->repo->getUsersByRole(['Junior Developer','Senior Developer' ,'Tester']);
            return $users;


        }
        elseif ($role == 'Junior Developer') {
            $users =[];
            $pos = $this->repo->getUsersByRole(['ProductOwner']);
            $user = $this->repo->getById($id);
            $supervisor = $this->repo->getById($user->supervisor);
            $team = $this->repo->getBySupervisorId($user->supervisor);
            array_push($users,$pos,$supervisor,$team);
            return $users;

        }
            
         else {
            return response()->json([
                "message" => "Users not found"
            ], 404);
        }
       

    }
    /* check role ?
    manager or senior => user_id and check supervisor col
    po 
    retrive all (j,s,testers)
    junior
    retrive all pos
    his senior
     and team members(user and check supervisor)
    senior 
    retrive all juniors (user_id) 
    */

}
