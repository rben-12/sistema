<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
        'folio',
        'descripcion',
        'tipo_id',
        'fecha_doc',
        'url'
    ];

    public function tipo() 
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    } 
}
