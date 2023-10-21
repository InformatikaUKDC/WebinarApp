<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_users')->insert([
            'name' => 'yehezkiel',
            'email' => 'yehezkiel@email.com',
            'password' => bcrypt('yehezkiel123'),
            'no_wa' => '089529633429',
            'gender' => 'Pria',
            'address' => 'Jalan 123, Sidoarjo',
            'institution' => 'Master Admin',
            'role_id' => 1,
            'email_verified_at' => now(),
            'last_since' => now()
        ]);
    }
}
