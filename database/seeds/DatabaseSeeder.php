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
        // Esborrar taules.
        $this->truncateTables([
            'professions'
        ]);

        // Registrar Seeders per a executar-los.
        $this->call(ProfessionSeeder::class);
    }

    /*
    # truncateTables()
    Emprat per a esborrar les taules.
    ------------------------------------------------------------------------- */
    protected function truncateTables(array $tables)
    {
        // 1. Desactivar revisió claus foranes. -> DB::statement...
        // 2. Esborrat de taules.               -> truncate()...
        // 3. Reactivar revisó de claus foranes.
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    }
}
