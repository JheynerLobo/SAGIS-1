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

    
    public function videos()
    {
        return $this->hasMany(GraduateVideo::class);
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