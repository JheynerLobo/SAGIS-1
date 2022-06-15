<?php

namespace App\Repositories;

use App\Models\AcademicLevel;
use App\Repositories\AbstractRepository;

class AcademicLevelRepository extends AbstractRepository
{
    public function __construct(AcademicLevel $model)
    {
        $this->model = $model;
    }
}
