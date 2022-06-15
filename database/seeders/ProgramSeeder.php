<?php

namespace Database\Seeders;

use App\Repositories\AcademicLevelRepository;
use App\Repositories\FacultyRepository;
use App\Repositories\ProgramRepository;
use Illuminate\Database\Seeder;

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
        $this->facultyRepository->all()->each(function ($faculty) {
            $randomNumber = rand(2, 4);
            $this->programRepository->createFactory($randomNumber, [
                'academic_level_id' => $this->academicLevelRepository->randomFirst()->id,
                'faculty_id' => $faculty->id
            ]);
        });
    }
}
