<?php

namespace App\Repositories;

use App\Models\DocumentType;
use App\Repositories\AbstractRepository;

class DocumentTypeRepository extends AbstractRepository
{
    public function __construct(DocumentType $model)
    {
        $this->model = $model;
    }
}
