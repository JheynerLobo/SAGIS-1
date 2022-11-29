<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

use App\Repositories\AcademicLevelRepository;

class AcademicLevelSeeder extends Seeder
{
    /**
     * @var AcademicLevelRepository
     */
    protected $academicLevelRepository;

    public function __construct(AcademicLevelRepository $academicLevelRepository)
    {
        $this->academicLevelRepository = $academicLevelRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Pregrado'],
            ['name' => 'Especialización'],
            ['name' => 'Maestría'],
            ['name' => 'Doctorado'],
        ];

        try {
            foreach ($items as $item) {
                $this->academicLevelRepository->create($item);
            }
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
