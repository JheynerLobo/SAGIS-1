<?php

namespace App\Repositories;

use App\Models\EmpleoImage;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Storage;

class EmpleoImageRepository extends AbstractRepository
{

       /** @var */
       protected $disk = 'empleos';
    public function __construct(EmpleoImage $model)
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
    public function deleteImage(EmpleoImage $empleo)
    {
        if (Storage::disk($this->disk)->exists($empleo->web_image)) {
            Storage::disk($this->disk)->delete($empleo->image);
        }
    }

    /**
     * @param Person $loyalty
     * @param string $file
     * @param string $fileName
     * 
     * @return void
     */
    public function replaceImage(EmpleoImage $empleo, string $file, string $fileName)
    {
        $this->deleteImage($empleo);
        $this->saveImage($file, $fileName);
    }


    public function getEmpleoGaleria()
    {

        $table = $this->model->getTable();
        $joinEmpleos = "empleos";
        $query = $this->model
            ->select("*")
            ->join("{$joinEmpleos}", "{$table}.empleo_id", "{$joinEmpleos}.id")
            ->where('empleo_images.is_header', 1)
            ->orderBy("{$table}.id", 'ASC');

        

        return $query->get();
    }




}
