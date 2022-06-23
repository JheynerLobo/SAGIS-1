<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use Exception;

class StateSeeder extends Seeder
{
    /** @var StateRepository */
    protected $stateRepository;

    /** @var CountryRepository */
    protected $countryRepository;

    public function __construct(
        StateRepository $stateRepository,
        CountryRepository $countryRepository
    ) {
        $this->stateRepository = $stateRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            if ($countryColombia = $this->countryRepository->getByAttribute('slug', 'co')) {
                $this->stateRepository->create([
                    'country_id' => $countryColombia->id,
                    'name' => 'Norte de Santander',
                    'slug' => 'nsa'
                ]);
            }

            $this->countryRepository->all()->map(function ($country) {
                $randomNumber = rand(2, 5);
                $this->stateRepository->createFactory($randomNumber, ['country_id' => $country->id]);
            });
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
