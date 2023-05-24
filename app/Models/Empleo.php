<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['empresa', 'cargo', 'description', 'date', 'url_postulation'];


    /**
     * Get Images
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(EmpleoImage::class);
    }


    /**
     * Get Images
     * 
     * @return \App\Models\EmpleoImage
     */
    public function imageHeader()
    {
        return $this->images()->where('is_header', true)->first();
    }

    public function getCountimage()
    {
        return $this->images()->count();
    }

   

    public function is_imageOne()
    {
        return $this->images()->count()== 1? true: false;
    }

    

    /**
     * Get if the empleos has images
     * 
     * @return bool
     */
    public function hasImages()
    {
        return $this->images()->count() > 0 ? true : false;
    }

 

    
}