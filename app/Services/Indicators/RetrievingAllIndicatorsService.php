<?php

namespace App\Services\Indicators;

use App\Repositories\IndicatorRepository;

class RetrievingAllIndicatorsService
{
    protected $repo;

    /**
     * Creating criteriaService instance
     *
     * @param indicatorrepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving all Indicators service
     *
     * @return array
     */
    public function execute()
    {
        return $this->repo->getAll();
    }
}
