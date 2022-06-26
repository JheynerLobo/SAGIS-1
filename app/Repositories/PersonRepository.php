<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use Illuminate\Support\Facades\Storage;

use App\Models\Person;

class PersonRepository extends AbstractRepository
{
    /** @var */
    protected $disk = 'people';

    public function __construct(Person $model)
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
    public function deleteImage(Person $person)
    {
        if (Storage::disk($this->disk)->exists($person->web_image)) {
            Storage::disk($this->disk)->delete($person->image);
        }
    }

    /**
     * @param Person $loyalty
     * @param string $file
     * @param string $fileName
     * 
     * @return void
     */
    public function replaceImage(Person $person, string $file, string $fileName)
    {
        $this->deleteImage($person);
        $this->saveImage($file, $fileName);
    }
}
