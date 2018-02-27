<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professions')->truncate(); // Buidar taula abans de crear seeders.

        DB::table('professions')->insert([
            'title' => 'Pagès'
        ]);

        DB::table('professions')->insert([
            'title' => 'Apicultor'
        ]);

        DB::table('professions')->insert([
            'title' => 'Agricultor'
        ]);
    }
}
