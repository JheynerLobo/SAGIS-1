<?php

namespace App\Repositories;

use App\Models\EmpleoCategory;
use App\Repositories\AbstractRepository;

class EmpleoCategoryRepository extends AbstractRepository
{
    public function __construct(EmpleoCategory $model)
    {
        $this->model = $model;
    }
}