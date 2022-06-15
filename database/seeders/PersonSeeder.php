<?php

namespace Database\Seeders;

use App\Repositories\CityRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\PersonRepository;
use Illuminate\Database\Seeder;

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
        $this->personRepository->createFactory(500, [
            'document_type_id' => $this->documentTypeRepository->randomFirst()->id,
            'birthdate_place_id' => $this->cityRepository->randomFirst()->id
        ]);
    }
}
