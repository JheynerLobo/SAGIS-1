<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateVideo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['graduate_id', 'asset_url', 'is_header'];

    /**
     * Get the Graduate
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function graduate()
    {
        return $this->belongsTo(Graduate::class, 'graduate_id');
    }

    /**
     * Get the full asset
     * 
     * @return string
     */
    public function fullAsset()
    {
        return "https://www.youtube.com/embed/" . $this->asset_url;
    }
   
}