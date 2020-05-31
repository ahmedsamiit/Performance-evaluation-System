<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Services\Indicators\RetrievingAllIndicatorsService;
use App\Services\Indicators\RetrievingIndicatorService;
use App\Services\Indicators\StoringIndicatorsService;
use App\Services\Indicators\UpdatingIndicatorService;
use App\Services\Indicators\DeletingIndicatorService;

class IndicatorController extends Controller
{

    public function index(RetrievingAllIndicatorsService $service, Request $request)
    {
        return $service->execute();
    }

    public function store(Request $request, StoringIndicatorsService $service)
    {
        return $service->execute($request);

    }

    public function destroy($id, DeletingIndicatorService $service)
    {
        return $service->execute($id);

    }

    public function show(RetrievingIndicatorService $service, $id)
    {
        return $service->execute($id);
    }

    public function update($id, Request $request, UpdatingIndicatorService $service)
    {
        return $service->execute($id, $request);

    }
}
