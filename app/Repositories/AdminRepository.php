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

    /**
     * Get users by role
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRole(string $role)
    {
        return $this->model->role($role)->get();
    }
}
