<?php

namespace Database\Seeders;

use App\Repositories\PostCategoryRepository;
use App\Repositories\PostImageRepository;
use App\Repositories\PostRepository;
use Exception;
use Illuminate\Database\Seeder;

class PostImageSeeder extends Seeder
{
    /** @var PostImageRepository */
    protected $postImageRepository;

    /** @var PostRepository */
    protected $postRepository;

    /** @var PostCategoryRepository */
    protected $postCategoryRepository;


    public function __construct(
        PostImageRepository $postImageRepository,
        PostRepository $postRepository,
        PostCategoryRepository $postCategoryRepository
    ) {
        $this->postImageRepository = $postImageRepository;
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
            $postCategories = $this->postCategoryRepository->all();

            $posts = $this->postRepository->all();


            /** Notice */
            $postNotice = $postCategories->where('name', 'Noticias')->first();
            $this->createPostAssets($postNotice, $posts);

            /** Course */
            $postCourse = $postCategories->where('name', 'Cursos')->first();
            $this->createPostAssets($postCourse, $posts);

            /** Evento */
            $postEvent = $postCategories->where('name', 'Eventos')->first();
            $this->createPostAssets($postEvent, $posts);

            /** Galería */
            $postGallery = $postCategories->where('name', 'Galería')->first();
            $this->createPostAssets($postGallery, $posts);
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }

    /**
     * @param \App\Models\PostCategory $postCategory
     * @param \Illuminate\Database\Eloquent\Collection $posts
     * 
     * @return void
     */
    protected function createPostAssets($postCategory, $posts)
    {
        $randomNumber = generateRandomPostAssets(3, 8);

        $posts->where('post_category_id', $postCategory->id)->map(function ($post) use ($randomNumber) {
            $this->postImageRepository->createFactory(1, [
                'post_id' => $post->id,
                'is_header' => true
            ]);

            do {
                $this->postImageRepository->createFactory(1, [
                    'post_id' => $post->id
                ]);

                $randomNumber--;
            } while ($randomNumber > 0);
        });
    }
}
