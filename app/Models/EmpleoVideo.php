<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleoVideo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['empleo_id', 'asset_url', 'is_header'];

    /**
     * Get the Empleo
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleo()
    {
        return $this->belongsTo(Empleo::class);
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