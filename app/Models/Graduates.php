<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduates extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'description', 'date'];


    /**
     
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Get Images
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function getCountVideo()
    {
        return $this->videos()->count();
    }

    /**
     * Get Images
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(GraduateImage::class, 'graduate_id');
    }

     /**
     * Get Images
     * 
     * @return \App\Models\GraduateImage
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
     * Get if the graduate has images
     * 
     * @return bool
     */
    public function hasImages()
    {
        return $this->images()->count() > 0 ? true : false;
    }

    
    public function videos()
    {
        return $this->hasMany(GraduateVideo::class, 'graduate_id');
    }

    /**
     * Get Images
     * 
     * @return \App\Models\GraduateVideo
     */
    public function videoHeader()
    {
        return $this->videos()->where('is_header', true)->first();
    }

    public function hasVideos()
    {
        return $this->videos()->count() > 0 ? true : false;
    }


    
}