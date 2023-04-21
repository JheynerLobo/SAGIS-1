<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'date'];


    /**
     * Get Experience Category
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

    
    public function videos()
    {
        return $this->hasMany(ExperienceVideo::class);
    }

    /**
     * Get Images
     * 
     * @return \App\Models\ ExperienceVideo
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