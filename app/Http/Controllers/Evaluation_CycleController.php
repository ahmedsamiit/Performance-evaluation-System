<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Services\evaluation_cycles\RetrievingAllEvaluation_CyclesService;
use App\Services\evaluation_cycles\RetrievingEvaluation_CycleService;
use App\Services\evaluation_cycles\StoringEvaluation_CycleService;
use App\Services\evaluation_cycles\UpdatingEvaluation_CycleService;
use App\Services\evaluation_cycles\DeletingEvaluation_cycleService;

class evaluation_cycleController extends Controller
{
    public function index(RetrievingAllEvaluation_CyclesService $service, Request $request)
    {
        return $service->execute();
    }

    public function store(Request $request, StoringEvaluation_CycleService $service)
    {
        return $service->execute($request);

    }

    public function destroy($id, DeletingEvaluation_cycleService $service)
    {
        return $service->execute($id);

    }

    public function show(RetrievingEvaluation_CycleService $service, $id)
    {
        return $service->execute($id);
    }

    public function update($id, Request $request, UpdatingEvaluation_CycleService $service)
    {
        return $service->execute($id, $request);

    }
}
