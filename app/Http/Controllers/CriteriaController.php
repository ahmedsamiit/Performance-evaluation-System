<?php

namespace App\Http\Controllers;

use App\Services\Criterias\DeletingCriteriaService;
use App\Services\Criterias\RetrievingAllCriteriasService;
use App\Services\Criterias\RetrievingCriteriaService;
use App\Services\Criterias\StoringCriteriaService;
use App\Services\Criterias\UpdatingCriteriaService;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index(RetrievingAllCriteriasService $service, Request $request)
    {
        return  $service->execute();
    }

    public function store(Request $request ,StoringCriteriaService $service)
    {
        return $service->execute($request);

    }
    public function destroy( $id,DeletingCriteriaService $service)
    {
        return $service->execute($id);

    }
    public function show(RetrievingCriteriaService $service ,$id)
    {
        return $service->execute($id);
    }
    public function update($id,Request $request , UpdatingCriteriaService $service)
    {
        return $service->execute($id,$request);

    }
}
