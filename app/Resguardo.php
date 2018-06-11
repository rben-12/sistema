<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resguardo extends Model
{
    protected $table ='resguardos';
    protected $fillable =[
        'n_resguardo',
        'reguardante',
        'puesto',
        'departamento_id',
        'extencion',
        'ip_address',
        'mac_address',
        'articulo_id',
        'archivo'

    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'artiulo_id', 'id');
    }
}
