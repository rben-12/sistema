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

    public function resguardos()
    {
        return $this->hasMany(Resguardo::class, 'articulo_id', 'id');
    }

    public function scopeArticulo($query, $articulo)
    {
        if(trim($articulo))
        return $query->where('inv_interno', 'LIKE', "%$articulo%")
        ->orwhere('descripcion', 'LIKE', "%$articulo%")
        ->orwhere('inv_externo', 'LIKE', "%$articulo%")
        ->orwhere('serie', 'LIKE', "%$articulo%")
        ->orwhere('modelo', 'LIKE', "%$articulo%")
        ->orwhere('ubicacion', 'LIKE', "%$articulo%");

        //return $query->where(\DB::raw("CONCAT(categoria_id, descripcion, inv_interno, inv_externo, serie, modelo)"), 'LIKE', "%$articulo%");
    }

    
}
