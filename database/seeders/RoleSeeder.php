<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('tb_roles')->insert([
            'role' => 'admin'
        ]);
        DB::table('tb_roles')->insert([
            'role' => 'non-admin'
        ]);
    }
}
