<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonCompany extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person_company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['person_id', 'company_id', 'in_working', 'start_date', 'end_date', 'salary'];


    /** Relation Methods */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
