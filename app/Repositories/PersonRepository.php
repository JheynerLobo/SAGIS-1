<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\AbstractRepository;

class PersonRepository extends AbstractRepository
{
    public function __construct(Person $model)
    {
        $this->model = $model;
    }
}
