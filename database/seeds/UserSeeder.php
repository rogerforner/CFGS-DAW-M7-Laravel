<?php
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
        $professionID = DB::table('professions')
            ->where('title', 'Pagès')
            ->value('id');

        User::create([
            'name'          => 'Pepe M.',
            'email'         => 'pepe@example.com',
            'password'      => bcrypt('laravel'),
            'profession_id' => $professionID,
        ]);
    }
}
