<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['marca'];


    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'marca_id', 'id');
    }

    public function scopeMarca($query, $marca)
    {
        if(trim($marca))
        return $query->where('marca', 'LIKE', "%$marca%");
    }
}
