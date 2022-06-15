<?php

namespace App\Repositories;

use App\Models\State;
use App\Repositories\AbstractRepository;

class StateRepository extends AbstractRepository
{
    public function __construct(State $model)
    {
        $this->model = $model;
    }
}
