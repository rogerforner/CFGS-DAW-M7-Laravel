<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Desactivar revisió claus foranes. -> DB::statement...
        // 2. Esborrat de taules.               -> truncate()...
        // 3. Reactivar revisó de claus foranes.
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('professions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionSeeder::class);
    }
}
