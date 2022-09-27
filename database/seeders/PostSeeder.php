<?php

namespace Database\Seeders;

use App\Repositories\PostCategoryRepository;
use Illuminate\Database\Seeder;

use App\Repositories\PostRepository;
use Exception;

class PostSeeder extends Seeder
{
    /** @var PostRepository */
    protected $postRepository;

    /** @var PostCategoryRepository */
    protected $postCategoryRepository;


    public function __construct(
        PostRepository $postRepository,
        PostCategoryRepository $postCategoryRepository
    ) {
        $this->postRepository = $postRepository;
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
            $this->postCategoryRepository->all()->map(function ($postCategory) {
                $randomNumber = rand(5, 20);

                do {
                    $this->postRepository->createFactory(1, [
                        'post_category_id' => $postCategory->id
                    ]);
                    $randomNumber--;
                } while ($randomNumber > 0);
            });
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
