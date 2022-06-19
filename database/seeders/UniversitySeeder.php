<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\CityRepository;
use App\Repositories\UniversityRepository;

class UniversitySeeder extends Seeder
{
    /** @var UniversityRepository */
    protected $universityRepository;

    /** @var CityRepository */
    protected $cityRepository;

    public function __construct(
        UniversityRepository $universityRepository,
        CityRepository $cityRepository
    ) {
        $this->universityRepository = $universityRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cityRepository->all()->map(function ($city){
            $randomNumber = 2;
            $this->universityRepository->createFactory($randomNumber, ['city_id' => $city->id]);
        });
    }
}
