<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asunto extends Model
{
    protected $table ='asuntos';
    protected $fillable =[ 'asunto' ];

    public function incidencia()
    {
        return $this->hasMany(Incidencia::class, 'asunto_id', 'id');
    }
}
