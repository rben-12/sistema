<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';
    protected $fillable = [
        'folio',
        'descripcion',
        'tipo_id',
        'fecha_docs'
    ];

    public function tipo() 
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    } 
}
