<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;



/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['university_id', 'name'];


 /** Relation Methods */
public function university ()
{
    return $this->belongsTo(University::class);
}

public function programs()
{
    return $this->hasMany(Program::class);
}
}