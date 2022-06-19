<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\CityRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\PersonRepository;

class PersonSeeder extends Seeder
{
    /** @var PersonRepository */
    protected $personRepository;

    /** @var DocumentTypeRepository */
    protected $documentTypeRepository;

    /** @var CityRepository */
    protected $cityRepository;

    public function __construct(
        PersonRepository $personRepository,
        DocumentTypeRepository $documentTypeRepository,
        CityRepository $cityRepository
    ) {
        $this->personRepository = $personRepository;
        $this->documentTypeRepository = $documentTypeRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomNumber = 500;

        $documentTypes = $this->documentTypeRepository->all();
        $cities = $this->cityRepository->all();

        do {
            $this->personRepository->createFactory(1, [
                'document_type_id' => $documentTypes->random(1)->first()->id,
                'birthdate_place_id' => $cities->random(1)->first()->id
            ]);
            $randomNumber--;
        } while ($randomNumber > 0);
    }
}
