<?php

namespace App\Repositories;

use App\Models\Faculty;
use App\Repositories\AbstractRepository;

class FacultyRepository extends AbstractRepository
{
    public function __construct(Faculty $model)
    {
        $this->model = $model;
    }
}
