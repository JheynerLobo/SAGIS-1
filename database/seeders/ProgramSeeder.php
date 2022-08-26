<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\AcademicLevelRepository;
use App\Repositories\FacultyRepository;
use App\Repositories\ProgramRepository;
use Exception;

class ProgramSeeder extends Seeder
{
    /** @var ProgramRepository */
    protected $programRepository;

    /** @var FacultyRepository */
    protected $facultyRepository;

    /** @var AcademicLevelRepository */
    protected $academicLevelRepository;

    public function __construct(
        ProgramRepository $programRepository,
        FacultyRepository $facultyRepository,
        AcademicLevelRepository $academicLevelRepository
    ) {
        $this->programRepository = $programRepository;
        $this->facultyRepository = $facultyRepository;
        $this->academicLevelRepository = $academicLevelRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $academicLevels = $this->academicLevelRepository->all();

            if ($facultySistemasUFPS = $this->facultyRepository->getByAttribute('name', 'Facultad de Ingeniería')) {
                $academicLevelPregrado = $academicLevels->where('name', 'pregrado')->first();

                $this->programRepository->create([
                    'faculty_id' => $facultySistemasUFPS->id,
                    'academic_level_id' => $academicLevelPregrado->id,
                    'name' => 'Programa de Ingeniería de Sistemas',
                ]);
            }

            $this->facultyRepository->all()->map(function ($faculty) use ($academicLevels) {
                $randomNumber = rand(1, 2);

                do {
                    $this->programRepository->createFactory(1, [
                        'academic_level_id' => $academicLevels->random(1)->first()->id,
                        'faculty_id' => $faculty->id
                    ]);
                    $randomNumber--;
                } while ($randomNumber >= 0);
            });
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
