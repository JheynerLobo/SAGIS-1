<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['graduate_id', 'asset_url', 'asset', 'is_header'];

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
        return $this->asset_url . $this->asset;
    }
}