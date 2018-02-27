<?php

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

        DB::table('users')->insert([
            'name'          => 'Pepe M.',
            'email'         => 'pepe@example.com',
            'password'      => bcrypt('laravel'),
            'profession_id' => $professionID,
        ]);
    }
}
