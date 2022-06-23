<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\CityRepository;
use App\Repositories\UniversityRepository;
use Exception;

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
        try {
            if ($cityCucuta = $this->cityRepository->getByAttribute('slug', 'cuc')) {
                $this->universityRepository->create([
                    'city_id' => $cityCucuta->id,
                    'name' => 'Universidad Francisco de Paula Santander',
                    'address' => '#0- a Avenida Gran Colombia No. 12E-96'
                ]);
            }

            $this->cityRepository->all()->map(function ($city) {
                $randomNumber = 2;
                $this->universityRepository->createFactory($randomNumber, ['city_id' => $city->id]);
            });
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
