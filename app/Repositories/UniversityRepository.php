<?php

namespace App\Repositories;

use App\Models\University;
use App\Repositories\AbstractRepository;

class UniversityRepository extends AbstractRepository
{
    public function __construct(University $model)
    {
        $this->model = $model;
    }
}
