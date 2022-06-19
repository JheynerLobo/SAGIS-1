<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\AbstractRepository;

class RoleRepository extends AbstractRepository
{
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}
