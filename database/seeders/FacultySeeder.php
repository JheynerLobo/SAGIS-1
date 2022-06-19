<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\FacultyRepository;
use App\Repositories\UniversityRepository;

class FacultySeeder extends Seeder
{
    /** @var FacultyRepository */
    protected $facultyRepository;

    /** @var UniversityRepository */
    protected $universityRepository;

    public function __construct(
        FacultyRepository $facultyRepository,
        UniversityRepository $universityRepository
    ) {
        $this->facultyRepository = $facultyRepository;
        $this->universityRepository = $universityRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->universityRepository->all()->map(function ($university) {
            $randomNumber = rand(1, 3);
            $this->facultyRepository
                ->createFactory($randomNumber, ['university_id' => $university->id]);
        });
    }
}
