<?php

namespace App\Repositories;

use App\Models\EmpleoVideo;
use App\Repositories\AbstractRepository;

class EmpleoVideoRepository extends AbstractRepository
{
    public function __construct(EmpleoVideo $model)
    {
        $this->model = $model;
    }
}