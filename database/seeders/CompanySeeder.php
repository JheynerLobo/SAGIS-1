<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\CityRepository;
use App\Repositories\CompanyRepository;
use Exception;

class CompanySeeder extends Seeder
{
    /** @var CompanyRepository */
    protected $companyRepository;

    /** @var CityRepository  */
    protected $cityRepository;

    public function __construct(
        CompanyRepository $companyRepository,
        CityRepository $cityRepository
    ) {
        $this->companyRepository = $companyRepository;
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
            $this->cityRepository->all()->map(function ($city) {
                $randomNumber = 1;
                $this->companyRepository->createFactory($randomNumber, ['city_id' => $city->id]);
            });
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
