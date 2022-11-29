<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['person_id', 'email', 'password'];



     /**
     * Set the 
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make($value);
    }


    /**
     * @return \App\Models\Person
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
