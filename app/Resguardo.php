<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resguardo extends Model
{
    protected $table ='resguardos';
    protected $fillable =[
        'n_resguardo',
        'resguardante',
        'puesto',
        'departamento_id',
        'descripcion',
        'extension',
        'ip_address',
        'mac_address',
        'articulo_id',
        'archivo',
        'usuario_id'

    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'resguardo_id', 'id');
    }
    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id', 'id');
    }
}
