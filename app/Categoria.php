<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['categoria'];

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'categoria_id', 'id');
    }
}
