<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['tipo'];

    public function documento() 
    {
        return $this->belongsTo(Documento::class, 'documento_id', 'id');
    }
}
