<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='statuses';
    protected $fillable=['status'];

    public function articulos()
{
    return $this->hasMany(Articulo::class, 'status_id', 'id');
}
}