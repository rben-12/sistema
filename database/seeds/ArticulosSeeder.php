<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Articulo;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->truncate();
        $articulo = new Articulo();
        $articulo->categoria_id = '1';
        $articulo->descripcion = 'Articulo 1';
        $articulo->inv_interno = '1';
        $articulo->inv_externo = '1';
        $articulo->serie = '1';
        $articulo->marca_id = '1';
        $articulo->modelo = 'unico';
        $articulo->status_id = '3';
        $articulo->usuario_id = '1';
        $articulo->ubicacion = 'aqui';
        $articulo->save();

        $articulo = new Articulo();
        $articulo->categoria_id = '2';
        $articulo->descripcion = 'Articulo 2';
        $articulo->inv_interno = '2';
        $articulo->inv_externo = '2';
        $articulo->serie = '2';
        $articulo->marca_id = '2';
        $articulo->modelo = 'unico2';
        $articulo->status_id = '3';
        $articulo->usuario_id = '2';
        $articulo->ubicacion = 'aqui';
        $articulo->save();

        $articulo = new Articulo();
        $articulo->categoria_id = '1';
        $articulo->descripcion = 'Articulo 3';
        $articulo->inv_interno = '3';
        $articulo->inv_externo = '3';
        $articulo->serie = '3';
        $articulo->marca_id = '3';
        $articulo->modelo = 'unico3';
        $articulo->status_id = '3';
        $articulo->usuario_id = '2';
        $articulo->ubicacion = 'aqui';
        $articulo->save();

        $articulo = new Articulo();
        $articulo->categoria_id = '2';
        $articulo->descripcion = 'Articulo 4';
        $articulo->inv_interno = '4';
        $articulo->inv_externo = '4';
        $articulo->serie = '4';
        $articulo->marca_id = '1';
        $articulo->modelo = 'unico4';
        $articulo->status_id = '3';
        $articulo->usuario_id = '2';
        $articulo->ubicacion = 'aqui';
        $articulo->save();
    }
}
