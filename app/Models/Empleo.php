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
    protected $fillable = ['empresa', 'cargo', 'description', 'date'];


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

    public function getCountVideo()
    {
        return $this->videos()->count();
    }

    public function is_imageOne()
    {
        return $this->images()->count()== 1? true: false;
    }

    /**
     * Get Images
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany(EmpleoVideo::class);
    }

    /**
     * Get Images
     * 
     * @return \App\Models\EmpleoVideo
     */
    public function videoHeader()
    {
        return $this->videos()->where('is_header', true)->first();
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

    /**
     * Get if the empleos has videos
     * 
     * @return bool
     */
    public function hasVideos()
    {
        return $this->videos()->count() > 0 ? true : false;
    }

    
}