<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $table = 'encargados';
    protected $fillable = ['encargado'];

    public function incidencia()
    {
        return $this->hasMany(Incidencia::class, 'encargado_id', 'id');
    }
}
