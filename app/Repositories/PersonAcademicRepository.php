<?php

namespace App\Repositories;

use App\Models\PersonAcademic;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\DB;

class PersonAcademicRepository extends AbstractRepository
{
    public function __construct(PersonAcademic $model)
    {
        $this->model = $model;
    }

    public function graduatesByYear()
    {
        $query = $this->model
            ->select(['person_academic.year', DB::raw('count(person_academic.person_id) AS total')]);

        return $query
            // ->groupBy('person_academic.person_id')
            ->groupBy('person_academic.year')
            ->orderBy('person_academic.year', 'ASC')
            ->get();
    }
}
