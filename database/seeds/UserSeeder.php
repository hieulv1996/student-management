<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'userId' => '0000000000',
            'email' => 'admin@local.local',
            'phoneNumber' => '000000000',
            'password' => Hash::make('admin'),
            'fullName' => 'Administrator',
            'roleId' => 'role00',
            'dob' => '01/01/2000',
            'permanentAddress' => 'HoChiMinh',
            'temporaryAddress' => 'HoChiMinh',
            'identityCard' => ''
        ]);

        DB::table('users')->insert([
            'userId' => '0450080041',
            'email' => 'hieulv@local.local',
            'phoneNumber' => '0965614959',
            'password' => Hash::make('levanhieu'),
            'fullName' => 'Lê Văn Hiếu',
            'roleId' => 'role01',
            'dob' => '01/01/1996',
            'permanentAddress' => 'HoChiMinh',
            'temporaryAddress' => 'HoChiMinh',
            'identityCard' => ''
        ]);
    }
}
