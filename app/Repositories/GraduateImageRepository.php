<?php

namespace App\Repositories;

use App\Models\GraduateImage;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Storage;

class GraduateImageRepository extends AbstractRepository
{

       /** @var */
       protected $disk = 'graduates';
    public function __construct(GraduateImage $model)
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
     * @param Graduate $graduate
     * 
     * @return void 
     */
    public function deleteImage(GraduateImage $graduate)
    {
        if (Storage::disk($this->disk)->exists($graduate->web_image)) {
            Storage::disk($this->disk)->delete($graduate->image);
        }
    }

    /**
     * @param Graduate $loyalty
     * @param string $file
     * @param string $fileName
     * 
     * @return void
     */
    public function replaceImage(GraduateImage $graduate, string $file, string $fileName)
    {
        $this->deleteImage($graduate);
        $this->saveImage($file, $fileName);
    }


    public function getGraduateGaleria()
    {

        $table = $this->model->getTable();
        $joinGraduate = "graduates";
        $query = $this->model
            ->select("*")
            ->join("{$joinGraduate}", "{$table}.graduate_id", "{$joinGraduate}.id")
            ->where('graduate_image.is_header', 1)
            ->orderBy("{$table}.id", 'ASC');


        return $query->get();
    }
}