<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\AbstractRepository;

class AdminRepository extends AbstractRepository
{
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }
}
