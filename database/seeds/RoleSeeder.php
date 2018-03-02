<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(
          'product_create',
          'product_read',
          'product_update',
          'product_delete',
          'user_create',
          'user_read',
          'user_update',
          'user_delete'
        );

        $role = Role::create(['name' => 'worker']);
        $role->givePermissionTo(
          'product_create',
          'product_read',
          'product_update',
          'product_delete',
          'user_delete'
        );

        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo(
          'user_delete'
        );
    }
}
