<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonAcademic extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person_academic';

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
