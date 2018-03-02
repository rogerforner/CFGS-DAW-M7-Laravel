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
        ]);

        factory(USER::class)->create([
            'name'          => 'Treballador',
            'email'         => 'worker@example.com',
            'password'      => bcrypt('worker'),
        ]);

        // Usuari aleatori sense professió.
        // En creem 10.
        factory(USER::class, 10)->create();
    }
}
