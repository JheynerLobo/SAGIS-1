<?php

namespace App\Repositories;

use App\Models\Program;
use App\Repositories\AbstractRepository;

class ProgramRepository extends AbstractRepository
{
    public function __construct(Program $model)
    {
        $this->model = $model;
    }
}
