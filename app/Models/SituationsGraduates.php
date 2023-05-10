<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituationsGraduates extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    public $timestamps=false;
    protected $fillable = ['anio_graduation','graduados','anio_actual','independientes','dependientes','desempleados','trabajando'];
    protected $primaryKey= ['anio_graduation','anio_actual'];
}