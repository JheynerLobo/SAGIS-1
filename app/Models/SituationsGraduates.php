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

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery($query)
    {
        foreach ($this->getKeyName() as $keyName) {
            if (isset($this->$keyName)) {
                $query->where($keyName, '=', $this->$keyName);
            } else {
                throw new Exception(__METHOD__ . 'Missing part of the primary key: ' . $keyName);
            }
        }
        return $query;
    }

}