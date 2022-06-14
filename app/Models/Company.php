<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['city_id', 'name', 'address', 'email', 'phone'];





 /** Relation Methods */
 public function city()
 {
    return $this->belongsTo(City::class);
 }

 public function personCompanies()
 {
    return $this->hasMany(PersonCompany::class);
 }
}