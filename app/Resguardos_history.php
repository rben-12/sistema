<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resguardos_history extends Model
{
    protected $table ='resguardos_histories';
    protected $fillable =[
        'articulo_id',
        'resguardo_id'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsto(Categoria::class, 'categoria_id', 'id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id', 'id');
    }

    public function resguardo_h()
    {
        return $this->hasMany(Resguardos_history::class, 'resguardo_id', 'id');
    }
}
