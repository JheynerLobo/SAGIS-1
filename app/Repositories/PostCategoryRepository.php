<?php

namespace App\Repositories;

use App\Models\PostCategory;
use App\Repositories\AbstractRepository;

class PostCategoryRepository extends AbstractRepository
{
    public function __construct(PostCategory $model)
    {
        $this->model = $model;
    }
}
