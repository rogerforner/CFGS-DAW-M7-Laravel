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

        User::create([
            'name'          => 'Client',
            'email'         => 'client@example.com',
            'password'      => bcrypt('client'),
            'profession_id' => null,
        ]);
    }
}
