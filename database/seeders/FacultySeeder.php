<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

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
        try {
            if ($universityUFPS = $this->universityRepository->getByAttribute('name', 'Universidad Francisco de Paula Santander')) {
                $this->facultyRepository->create([
                    'university_id' => $universityUFPS->id,
                    'name' => 'Facultad de Ingeniería'
                ]);
            }

            $this->universityRepository->all()->map(function ($university) {
                $randomNumber = rand(1, 2);
                $this->facultyRepository
                    ->createFactory($randomNumber, ['university_id' => $university->id]);
            });
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
