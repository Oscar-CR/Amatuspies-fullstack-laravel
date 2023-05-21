<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gabriela',
            'lastname' => 'Tellez Garcia',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        DB::table('medical_appointment')->insert([
            'name' => 'jorge Rivero',
            'email' => 'jrm3108@gmail.com',
            'motive' => 'dolor pie izquierdo urge',
            'more_details' => bcrypt('password')
        ]);
    }
}
