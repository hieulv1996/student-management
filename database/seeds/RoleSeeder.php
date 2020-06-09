<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'roleId' => 'role00',
            'roleName' => 'administrator',
            'active' => true
        ]);
        DB::table('roles')->insert([
            'roleId' => 'role01',
            'roleName' => 'Student',
            'active' => true
        ]);
        DB::table('roles')->insert([
            'roleId' => 'role02',
            'roleName' => 'Teacher',
            'active' => true
        ]);
        DB::table('roles')->insert([
            'roleId' => 'role03',
            'roleName' => 'Guest',
            'active' => true
        ]);
    }
}
