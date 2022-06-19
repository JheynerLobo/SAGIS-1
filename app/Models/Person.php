<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'document_type_id', 'document', 'phone', 'telephone', 'email',
        'birthdate', 'birthdate_place_id', 'address'
    ];



    /** Relation Methods */
    public function personCompany()
    {
        return $this->belongsTo(PersonCompany::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }


    public function personAcademic()
    {
        return $this->belongsTo(PersonAcademic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
