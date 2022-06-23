<?php

namespace App\Repositories;

use App\Models\PostImage;
use App\Repositories\AbstractRepository;

class PostImageRepository extends AbstractRepository
{
    public function __construct(PostImage $model)
    {
        $this->model = $model;
    }
}
