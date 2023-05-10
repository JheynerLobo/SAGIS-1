<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

use App\Repositories\EmpleoCategoryRepository;

class EmpleoCategorySeeder extends Seeder
{
    /** @var EmpleoCategoryRepository */
    protected $empleoCategoryRepository;

    public function __construct(
        EmpleoCategoryRepository $empleoCategoryRepository
    ) {
        $this->empleoCategoryRepository = $empleoCategoryRepository;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $this->empleoCategoryRepository->create([
                'name' => 'Imagenes'
            ]);
            $this->postCategoryRepository->create([
                'name' => 'Documentos'
            ]);
            $this->postCategoryRepository->create([
                'name' => 'Videos'
            ]);
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}