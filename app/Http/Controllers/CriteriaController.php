<?php

namespace App\Http\Controllers;

use App\Services\Criterias\DeletingCriteriaService;
use App\Services\Criterias\RetrievingAllIndicatorsService;
use App\Services\Criterias\RetrievingIndicatorService;
use App\Services\Criterias\StoringIndicatorsService;
use App\Services\Criterias\UpdatingIndicatorService;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index(RetrievingAllIndicatorsService $service, Request $request)
    {
        return  $service->execute();
    }

    public function store(Request $request , StoringIndicatorsService $service)
    {
        return $service->execute($request);

    }
    public function destroy( $id,DeletingCriteriaService $service)
    {
        return $service->execute($id);

    }
    public function show(RetrievingIndicatorService $service , $id)
    {
        return $service->execute($id);
    }
    public function update($id, Request $request , UpdatingIndicatorService $service)
    {
        return $service->execute($id,$request);

    }
}
