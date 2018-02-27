<?php
use App\Profession;
use App\User;
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
        $professionID = Profession::where('title', 'Pagès')->value('id');

        factory(USER::class)->create([
            'name'          => 'Administrador',
            'email'         => 'admin@example.com',
            'password'      => bcrypt('admin'),
            'is_admin'      => true,
        ]);

        factory(USER::class)->create([
            'name'          => 'Treballador',
            'email'         => 'worker@example.com',
            'is_worker'     => true,
        ]);

        // Creem un usuari aleatori però amb un professió específica.
        factory(USER::class)->create([
            'profession_id' => $professionID,
        ]);

        // Usuari aleatori sense professió.
        // En creem 10.
        factory(USER::class, 10)->create();
    }
}
