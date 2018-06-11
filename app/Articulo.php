<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table ='articulos';
    protected $fillable =[
        'categoria_id',
        'descripcion',
        'inv_interno', 
        'inv_externo',
        'serie', 
        'marca_id',
        'modelo', 
        'status_id', 
        'ubicacion',    
];

   public function status() 
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    } 

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsto(Categoria::class, 'categoria_id', 'id');
    }

    public function resguardo()
    {
        return $this->belongsto(Resguardo::class, 'ariculo_id', 'id');
    }

    
}
