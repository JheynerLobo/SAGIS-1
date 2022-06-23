<?php

namespace App\Repositories;

use App\Models\PostVideo;
use App\Repositories\AbstractRepository;

class PostVideoRepository extends AbstractRepository
{
    public function __construct(PostVideo $model)
    {
        $this->model = $model;
    }
}
