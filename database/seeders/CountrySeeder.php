<?php

namespace Database\Seeders;

use App\Repositories\CountryRepository;
use Illuminate\Database\Seeder;

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
        $this->countryRepository->createFactory(50);
    }
}
