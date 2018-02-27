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
        // Seeders.
        DB::table('professions')->insert([
            'title' => 'Pagès'
        ]);

        DB::table('professions')->insert([
            'title' => 'Apicultor'
        ]);

        DB::table('professions')->insert([
            'title' => 'Esportista'
        ]);
    }
}
