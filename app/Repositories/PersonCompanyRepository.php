<?php

namespace App\Repositories;

use App\Models\PersonCompany;
use App\Repositories\AbstractRepository;

class PersonCompanyRepository extends AbstractRepository
{
    public function __construct(PersonCompany $model)
    {
        $this->model = $model;
    }
}
