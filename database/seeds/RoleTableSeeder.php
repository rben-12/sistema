<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();
        
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();
    }
}
