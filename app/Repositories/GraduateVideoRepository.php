<?php

namespace App\Repositories;

use App\Models\GraduateVideo;
use App\Repositories\AbstractRepository;

class GraduateVideoRepository extends AbstractRepository
{
    public function __construct(GraduateVideo $model)
    {
        $this->model = $model;
    }
}