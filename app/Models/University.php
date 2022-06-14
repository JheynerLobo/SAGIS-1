<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;


/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['city_id', 'name', 'address'];


    /** Relation Methods */
    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

}
