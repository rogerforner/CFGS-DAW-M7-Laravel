<?php
use App\Profession;
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
        Profession::create([
            'title' => 'Pagès'
        ]);

        Profession::create([
            'title' => 'Apicultor'
        ]);

        Profession::create([
            'title' => 'Esportista'
        ]);
    }
}
