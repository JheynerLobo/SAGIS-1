<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\AcademicLevelRepository;
use App\Repositories\FacultyRepository;
use App\Repositories\ProgramRepository;

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
        $this->facultyRepository->all()->map(function ($faculty) {
            $randomNumber = rand(1, 3);

            $academicLevels = $this->academicLevelRepository->all();

            do {
                $this->programRepository->createFactory(1, [
                    'academic_level_id' => $academicLevels->random(1)->first()->id,
                    'faculty_id' => $faculty->id
                ]);
                $randomNumber--;
            } while ($randomNumber >= 0);
        });
    }
}
