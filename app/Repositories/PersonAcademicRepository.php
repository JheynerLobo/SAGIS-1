<?php

namespace App\Repositories;

use App\Models\PersonAcademic;
use App\Repositories\AbstractRepository;

class PersonAcademicRepository extends AbstractRepository
{
    public function __construct(PersonAcademic $model)
    {
        $this->model = $model;
    }
}
