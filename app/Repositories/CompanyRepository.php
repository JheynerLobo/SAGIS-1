<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\AbstractRepository;

class CompanyRepository extends AbstractRepository
{
    public function __construct(Company $model)
    {
        $this->model = $model;
    }
}
