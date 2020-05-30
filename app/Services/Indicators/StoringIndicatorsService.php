<?php

namespace App\Services\Indicators;
use Illuminate\Http\Request;

use App\Repositories\IndicatorRepository;


class  StoringIndicatorsService
{
    protected $repo;


    /**
     * CreatingIndicatorService instance
     *
     * @param indicatorrepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * soring  indicator service
     *
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $data = $request->all();

        $indicator = $this->repo->create($data);
        if($indicator){
            return  response()->json($indicator);
        }
        return false;

    }


}
