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
        // Professions aleatòries.
        // En creem 10.
        factory(Profession::class, 10)->create();
    }
}
