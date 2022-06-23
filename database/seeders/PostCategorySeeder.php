<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

use App\Repositories\PostCategoryRepository;

class PostCategorySeeder extends Seeder
{
    /** @var PostCategoryRepository */
    protected $postCategoryRepository;

    public function __construct(
        PostCategoryRepository $postCategoryRepository
    ) {
        $this->postCategoryRepository = $postCategoryRepository;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $this->postCategoryRepository->create([
                'name' => 'Noticias'
            ]);
            $this->postCategoryRepository->create([
                'name' => 'Cursos'
            ]);
            $this->postCategoryRepository->create([
                'name' => 'Eventos'
            ]);
            $this->postCategoryRepository->create([
                'name' => 'Galería'
            ]);
            $this->postCategoryRepository->create([
                'name' => 'Vídeos'
            ]);
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
