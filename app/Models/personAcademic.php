<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personAcademic extends Model
{
    use HasFactory;



/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['person_id', 'program_id', 'year'];





 /** Relation Methods */
public function program()
{
    return $this->belongsTo(Program::class);
}

public function people()
{
    return $this->hasMany(Person::class);
}

}