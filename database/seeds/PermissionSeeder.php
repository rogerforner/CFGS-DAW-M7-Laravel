<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'product_create']);
        Permission::create(['name' => 'product_read']);
        Permission::create(['name' => 'product_update']);
        Permission::create(['name' => 'product_delete']);

        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_read']);
        Permission::create(['name' => 'user_update']);
        Permission::create(['name' => 'user_delete']);
    }
}
