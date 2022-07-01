<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

use App\Repositories\CountryRepository;

class CountrySeeder extends Seeder
{
    /** @var CountryRepository */
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomCountries = env('RANDOM_COUNTRIES', rand(50, 120));

        try {
            $this->countryRepository->createFactory($randomCountries);

            if (!$this->countryRepository->getByAttribute('name', 'Colombia')) {
                $this->countryRepository->create([
                    'name' => 'Colombia',
                    'slug' => 'co'
                ]);
            }
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
