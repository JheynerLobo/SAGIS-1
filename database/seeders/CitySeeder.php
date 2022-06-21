<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\StateRepository;
use App\Repositories\CityRepository;

class CitySeeder extends Seeder
{
    /** @var StateRepository */
    protected $stateRepository;

    /** @var CityRepository */
    protected $cityRepository;

    public function __construct(
        StateRepository $stateRepository,
        CityRepository $cityRepository
    ) {
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($stateNSA = $this->stateRepository->getByAttribute('slug', 'nsa')) {
            $this->cityRepository->create([
                'state_id' => $stateNSA->id,
                'name' => 'Cúcuta',
                'slug' => 'cuc'
            ]);
        }

        $this->stateRepository->all()->map(function ($state) {
            $randomNumber = rand(5, 10);
            $this->cityRepository->createFactory($randomNumber, ['state_id' => $state->id]);
        });
    }
}
