<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
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
