<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = [
        'departamento',
        'vlan'
    ];


    public function resguardo()
    {
        return $this->hasMany(Resguardo::class, 'departamento_id', 'id');
    }

    public function scopeDepartamento($query, $departamento)
    {
        if(trim($departamento))
        $query->where('departamento', 'LIKE', "%$departamento%");
    }

}
