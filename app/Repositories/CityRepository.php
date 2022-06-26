<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\AbstractRepository;

class CityRepository extends AbstractRepository
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function allOrderBy(string $order)
    {
        return $this->model
            ->with('state')->get();
    }
}
