<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Services\Indicators\RetrievingAllIndicatorsService;
use App\Services\Indicators\RetrievingIndicatorService;
use App\Services\Indicators\StoringIndicatorsService;
use App\Services\Indicators\UpdatingIndicatorService;
use App\Services\Indicators\DeletingIndicatorService;
use App\Http\Requests\StoreIndicatorRequest;
class IndicatorController extends Controller
{

    public function index(RetrievingAllIndicatorsService $service, Request $request)
    {
        return $service->execute();
    }

    public function store(StoreIndicatorRequest $request, StoringIndicatorsService $service)
    {
        return $service->execute($request->validated());

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
