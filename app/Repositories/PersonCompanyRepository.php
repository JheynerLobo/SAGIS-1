<?php

namespace App\Repositories;

use App\Models\PersonCompany;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\DB;

class PersonCompanyRepository extends AbstractRepository
{
    public function __construct(PersonCompany $model)
    {
        $this->model = $model;
    }

    public function searchExtranjeroGraduates()
    {
        $query = $this->model
            ->join('people', 'people.id', 'person_company.person_id')
            ->join('companies', 'companies.id', 'person_company.company_id')
            ->join('cities', 'cities.id', 'companies.city_id')
            ->join('states', 'states.id', 'cities.state_id')
            ->join('countries', 'countries.id', 'states.country_id')

            ->select('person_company.person_id');

        $query->where('countries.slug', '!=', 'co');

        $query->where('person_company.in_working', true);


        return $query
            ->groupBy('person_company.person_id')
            ->get();
    }

    public function getSalary()
    {
        $query = $this->model
            ->select(['person_company.person_id', 'person_company.salary']);

        $query->where('person_company.in_Working', true);

        return $query
            // ->groupBy('person_company.person_id')
            ->get();
    }

    public function withoutJob()
    {
        $query = $this->model
            ->select('person_company.person_id');

        return $query
            ->whereNotIn('person_id', function ($q) {
                return $q
                    ->select('person_company.person_id')
                    ->from('person_company')
                    ->where('person_company.in_working', true)
                    ->orderBy('person_company.person_id');
            })
            ->groupBy('person_company.person_id')
            ->get()->count();
    }

    public function graduatesByCountry()
    {
        $query = $this->model
            ->select([
                DB::raw('count(person_company.person_id) AS total')
            ])
            ->join('companies', 'companies.id', 'person_company.company_id')
            ->join('cities', 'cities.id', 'companies.city_id')
            ->join('states', 'states.id', 'cities.state_id')
            ->join('countries', 'countries.id', 'states.country_id');

        $query->where('person_company.in_working', true);

        return $query
            ->groupBy('countries.id')
            ->get()->map(function ($map) {
                return $map->total;
            });
    }
}
