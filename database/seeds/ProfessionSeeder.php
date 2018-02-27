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
        // Quan emprem Claus foranes ens dona un error. Desactivem la revisió
        // d'aquestes en la DB.
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Buidar taula abans de crear seeders.
        DB::table('professions')->truncate();

        // Seeders.
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
