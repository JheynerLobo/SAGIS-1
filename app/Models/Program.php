<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['faculty_id', 'level_id', 'name'];



    /** Relation Methods */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function academicLevel()
    {
        return $this->belongsTo(AcademicLevel::class);
    }

    public function personAcademics()
    {
        return $this->hasMany(PersonAcademic::class);
    }
}
