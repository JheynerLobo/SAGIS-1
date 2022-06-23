<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

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
        try {
            $randomNumber = 50;

            $documentTypes = $this->documentTypeRepository->all();
            $cities = $this->cityRepository->all();

            $cucutaCity = $cities->where('slug', 'cuc')->first();
            $ccDocument = $documentTypes->where('slug', 'c.c')->first();

            $this->personRepository->createFactory(1, [
                'name' => 'Jarlin Andrés',
                'lastname' => 'Fonseca',
                'email' => 'jarlinandres5000@gmail.com',
                'document' => '1006287478',
                'document_type_id' => $ccDocument->id,
                'birthdate_place_id' => $cucutaCity->id,
            ]);

            $this->personRepository->createFactory(1, [
                'name' => 'Judith del pilar',
                'lastname' => 'Rodríguez Tenjo',
                'email' => 'judithdelpilarrt@ufps.edu.co',
                'document_type_id' => $ccDocument->id,
                'birthdate_place_id' => $cucutaCity->id,
            ]);

            do {
                $this->personRepository->createFactory(1, [
                    'document_type_id' => $documentTypes->random(1)->first()->id,
                    'birthdate_place_id' => $cities->random(1)->first()->id
                ]);
                $randomNumber--;
            } while ($randomNumber > 0);
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
