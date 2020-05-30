<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_IndicatorController extends Controller
{
    public function create (Request $request, CreateUserIndicatorService $service)
    {
        return $service->execute($request);
    }

    public function getUserIndicators($id , RetriveUserIndicators $service)
    {
        return $service->execute($id);
    }
}
