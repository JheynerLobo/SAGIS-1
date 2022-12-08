<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;
use App\Repositories\PersonAcademicRepository;
use App\Repositories\PersonCompanyRepository;
use App\Repositories\PersonRepository;
use App\Repositories\PostRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use Faker\Generator as Faker;

use function PHPSTORM_META\map;

class ReportController extends Controller
{
    /** @var PersonRepository */
    protected $personRepository;

    /** @var UserRepository */
    protected $userRepository;

    /** @var RoleRepository */
    protected $roleRepository;

    /** @var PostRepository */
    protected $postRepository;

    /** @var CountryRepository */
    protected $countryRepository;

    /** @var PersonCompanyRepository */
    protected $personCompanyRepository;

    /** @var PersonAcademicRepository */
    protected $personAcademicRepository;

    /** @var Faker */
    protected $faker;

    public function __construct(
        PersonRepository $personRepository,
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        PostRepository $postRepository,
        CountryRepository $countryRepository,
        PersonCompanyRepository $personCompanyRepository,
        PersonAcademicRepository $personAcademicRepository,
        Faker $faker,
    ) {
        $this->middleware('auth:admin');

        $this->personRepository = $personRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->postRepository = $postRepository;
        $this->countryRepository = $countryRepository;
        $this->personCompanyRepository = $personCompanyRepository;
        $this->personAcademicRepository = $personAcademicRepository;
        $this->faker = $faker;
    }

    public function graduates()
    {
        try {
            $graduateRole = $this->roleRepository->getByAttribute('name', 'graduate');
            $items = $graduateRole->users;

            return view('admin.pages.reports.graduates', compact('items'));
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function statistics()
    {
        try {
            /* Número total de pots */
            $posts = $this->postRepository->getTotalPosts()->count();
           // dd($pots);

            /** Graduados en el Extranjero */
            $extraGraduates = $this->personCompanyRepository->searchExtranjeroGraduates()->count();

            /** Cantidad de Graduados */
            $graduates = $this->userRepository->getByRole('graduate')->count();

            /** Salary MIN */
            $salaryMin = $this->personCompanyRepository->getSalary()->min('salary');

            /** Salary MAX */
            $salaryMax = $this->personCompanyRepository->getSalary()->max('salary');

            /** With Job */
            $graduadosConTrabajo = $this->personCompanyRepository->graduadosConTrabajo();

            /* Graduados sin Trabajo */
            $graduadoSinTrabajo = $graduates  -$graduadosConTrabajo;

            /** Countries */
            $countries = $this->countryRepository->all()->map(function ($map) {
                return $map->name;
            });

            /* Countries workings */

            $countriesWorking = $this->personCompanyRepository->graduatesByCountryName()->map(function ($map) {
                return $map->name;
            });

           /*  dd($countries); */
            /** Worker by Countries */
            $graduatesByCountry = $this->personCompanyRepository->graduatesByCountry();

            $arrayColors = $graduatesByCountry->map(function ($map) {
                return $this->faker->unique()->hexColor;
            });

            /** Graduates by Year */
            $graduatesByYear = $this->personAcademicRepository->graduatesByYear();

            $years = $graduatesByYear->map(function ($map) {
                return $map->year;
            });

            $graduatesByYearTotals = $graduatesByYear->map(function ($map) {
                return $map->total;
            });

            // return $years;

            return view('admin.pages.reports.statistics', compact(
                'extraGraduates',
                'graduates',
                'salaryMin',
                'salaryMax',
                'graduadosConTrabajo',
                'countries',
                'graduatesByCountry',
                'arrayColors',
                'years',
                'graduatesByYearTotals',
                'posts', 'graduadoSinTrabajo',
               'countriesWorking'
                
            ));
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
