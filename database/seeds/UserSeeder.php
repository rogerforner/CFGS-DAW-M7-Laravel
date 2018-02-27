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

        User::create([
            'name'          => 'Administrador',
            'email'         => 'admin@example.com',
            'password'      => bcrypt('admin'),
            'profession_id' => $professionID,
            'is_admin'      => true
        ]);

        User::create([
            'name'          => 'Treballador',
            'email'         => 'worker@example.com',
            'password'      => bcrypt('worker'),
            'profession_id' => $professionID,
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
