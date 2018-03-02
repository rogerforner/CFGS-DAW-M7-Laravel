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
        factory(USER::class, 15)->create()->each(function ($user) {
            if ($user->id == 1) {
                $user->assignRole('admin');
            } elseif ($user->id == 2) {
                $user->assignRole('worker');
            } else {
                $user->assignRole('client');
            }
        });
    }
}
