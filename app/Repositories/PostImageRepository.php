<?php

namespace App\Repositories;

use App\Models\PostImage;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Storage;

class PostImageRepository extends AbstractRepository
{

       /** @var */
       protected $disk = 'posts';
    public function __construct(PostImage $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $file
     * @param string $fileName
     * 
     */
    public function saveImage(string $file, string $fileName)
    {
        Storage::disk($this->disk)->put($fileName, $file);
    }

    /**
     * @param Person $person
     * 
     * @return void 
     */
    public function deleteImage(PostImage $post)
    {
        if (Storage::disk($this->disk)->exists($post->web_image)) {
            Storage::disk($this->disk)->delete($post->image);
        }
    }

    /**
     * @param Person $loyalty
     * @param string $file
     * @param string $fileName
     * 
     * @return void
     */
    public function replaceImage(PostImage $post, string $file, string $fileName)
    {
        $this->deleteImage($post);
        $this->saveImage($file, $fileName);
    }


    public function getPotsGaleria()
    {

        $table = $this->model->getTable();
        $joinPost = "posts";
        $joinPostCategories = "post_categories";
        $query = $this->model
            ->select("*")
            ->join("{$joinPost}", "{$table}.post_id", "{$joinPost}.id")
            ->join("{$joinPostCategories}", "{$joinPost}.post_category_id", "{$joinPostCategories}.id")
            ->where('post_categories.name', 'like', '%Galería%')
            ->where('post_images.is_header', 1)
            ->orderBy("{$table}.id", 'ASC');

        // return $this->all(['id'])->where('post_category_id', 1);

        return $query->get();
    }




}
