<?php

use Illuminate\Database\Seeder;
use App\Status;
use App\Departamento;
use App\Marca;
//use App\User;
use App\Categoria;
use App\Asunto;
use App\Encargado;
use App\Tipo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => 'Revisado'
        ]);
        Status::create([
            'status' => 'No Revisado'
        ]);
        Status::create([
            'status' => 'Stock'
        ]);
        Status::create([
            'status' => 'Prestamo'
        ]);
        Status::create([
            'status' => 'Alta'
        ]);
        Status::create([
            'status' => 'Baja'
        ]);

        Departamento::create([
            'departamento' => 'soporte a redes y telefonia',
            'vlan' => '122'
        ]);

        Marca::create([
            'marca' => 'HP'
        ]);
        Marca::create([
            'marca' => 'DELL'
        ]);
        Marca::create([
            'marca' => 'GRANDESTREAM'
        ]); 
        /*Asunto::create([
            'asunto' => 'sin internet'
        ]); */

        Encargado::create([
            'encargado' => 'no asignado'
        ]);

        Tipo::create([
            'tipo' => 'memo'
        ]);

        Categoria::create([
            'categoria' => 'HARDWARE'
        ]);
        Categoria::create([
            'categoria' => 'SOFTWARE'
        ]);

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArticulosSeeder::class);
        //$this->call(ArticulosSeeder::class);
    }
}
