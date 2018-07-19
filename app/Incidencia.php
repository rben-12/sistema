<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table ='incidencias';
    protected $fillable =[
        'asunto',
        'descripcion',
        'encargado_id',
        'departamento_id',
        'solucion'
    ];

    /*public function asunto() 
    {
        return $this->belongsTo(Asunto::class, 'asunto_id', 'id');
    }*/

    public function encargado() 
    {
        return $this->belongsTo(Encargado::class, 'encargado_id', 'id');
    }
    
    public function departamento() 
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    } 
}
