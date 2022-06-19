<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\PersonAcademicRepository;
use App\Repositories\PersonRepository;
use App\Repositories\ProgramRepository;

class PersonAcademicSeeder extends Seeder
{
    /** @var PersonAcademicRepository */
    protected $personAcademicRepository;

    /** @var PersonRepository */
    protected $personRepository;

    /** @var ProgramRepository */
    protected $programRepository;

    public function __construct(
        PersonAcademicRepository $personAcademicRepository,
        PersonRepository $personRepository,
        ProgramRepository $programRepository
    ) {
        $this->personAcademicRepository = $personAcademicRepository;
        $this->personRepository = $personRepository;
        $this->programRepository = $programRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = $this->programRepository->all();

        $this->personRepository->all()->map(function ($person) use ($programs) {
            $pregrade = $programs->where('academic_level_id', 1)->random(1)->first();

            $this->personAcademicRepository->createFactory(1, [
                'person_id' => $person->id,
                'program_id' => $pregrade->id,
            ]);

            $randomNumber = rand(1, 3);

            $anotherProgram = $programs->where('academic_level_id', '!=', 1);

            do {
                $randomProgram = $anotherProgram->random(1)->first();
                $this->personAcademicRepository->createFactory(1, [
                    'person_id' => $person->id,
                    'program_id' => $randomProgram->id
                ]);
                $randomNumber--;
            } while ($randomNumber > 0);
        });
    }
}
