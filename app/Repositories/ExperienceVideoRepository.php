<?php

namespace App\Repositories;

use App\Models\ExperienceVideo;
use App\Repositories\AbstractRepository;

class ExperienceVideoRepository extends AbstractRepository
{
    public function __construct(ExperienceVideo $model)
    {
        $this->model = $model;
    }
}